<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
use App\Models\project;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Notification;
use App\Traits\GeneralTrait;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Events\NewNotification;
use App\Notifications\RealTimeNotification;


class CustomerPagesController extends Controller
{
    public function homepage()
    {
        try{
            $customer = User::select()->find(Auth::user()->id);

            if (!$customer) {
                return redirect()->route('login');
            } else {
                // event(new NewNotification('Hello mego'));
                // $customer->notify(new RealTimeNotification('Hello World'));
                return view('customer.homepage')->with(compact('customer'));
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }

    }

    public function construction_style()
    {
        try{
            $customer = User::select()->find(Auth::user()->id);
            if (!$customer) {
                return redirect()->route('login');
            } else {
                return view('customer.construction_style')->with(compact('customer'));
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }

    }
    public function your_project()
    {
        $id =Auth::user()->id;
        try{
            $customer = User::find($id);
            $project = Project::where('user_id', '=', $id)->with(['props'])->get();


            if (!$customer && !$project) {
                return redirect()->route('login');
            } else {
                return view('customer.your_project')->with(compact('customer','project'));
                // return $project;
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }

    public function profile()
    {
        if(Auth::check()){
            try{
                $customer = User::select()->find(Auth::user()->id);
                if (!$customer) {
                    return redirect()->route('login');
                } else {
                    return view('customer.profile', compact('customer'));
                }
            } catch (\Exception $e) {
                return redirect()->route('login');
            }
        } else{
            return redirect()->route('login');
        }

    }

    public function edit()
    {
        try{
            $customer = User::select()->find(Auth::user()->id);
            if (!$customer) {
                return redirect()->route('customer.profile')->with(['error' => 'هذه اللغة غير موجوده']);
            } else {
                return view('customer.edit', compact('customer'));
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }


    public function details($id)
    {
        try{

            $user = Auth::user();
            $users = User::find($user->id);
            $props = Property::all()->where('project_id', '=', $id);
            $project = Project::all()->where('id', '=', $id);
            $comments = Comment::where('project_id',$id)->with(['users','replies'])->get();
            $project_id = $id;
            // $user = Comment::where('user_id',$user->id)->with(['users'])->get();
            $num_of_comments = Comment::where('user_id',"=",Auth::user()->id)->where('project_id',"=",$id)->get();


            if (!$users && !$props && !$project && !$comments_of_users && !$replies_of_users) {
                return redirect()->back();
            } else {
                foreach($project as $pro){
                    if( $pro->user_id !== $users->id){
                        return redirect()->route('notfound')->with('هناك خطأ يرجي المحاوله في وقت اخر');

                    }else{
                        return view('customer.details')->with(compact('users','props','project','comments','project_id','num_of_comments'));
                    }
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('هناك خطأ يرجي المحاوله في وقت اخر');
        }

    }

    public function payment($project_id){
        try{
            $customer = User::select()->find(Auth::user()->id);
            $project = Project::find($project_id);
            $props = Property::where('project_id', '=', $project_id)->get();
            if (!$customer) {
                return redirect()->route('login');
            } else {
                return view('customer.payment')->with(compact('customer','project_id','props','project'));

            }

        } catch (\Exception $e) {
            return redirect()->route('login');
            // return 'no';
        }
    }
    public function paymentDefault(){
        try{
            $customer = User::select()->find(Auth::user()->id);
            if (!$customer) {
                return redirect()->route('login');
            } else {
                return view('customer.paymentDefault')->with(compact('customer'));
                // return $customer;
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
            // return "no";
        }
    }


}
