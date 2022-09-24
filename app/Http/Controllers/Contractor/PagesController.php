<?php

namespace App\Http\Controllers\Contractor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
use App\Models\Project;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Notification;
use App\Models\Transaction;
use App\Traits\GeneralTrait;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use DB;


class PagesController extends Controller
{
    public function homepage()
    {
        try{
            $contractor = User::select()->find(Auth::user()->id);
            $notifications = Notification::where('notification_type', '=', "upload")->orderBy('id', 'DESC')->get();
            $notification_count = Notification::where('seen',"=",0)->count();



            if (!$contractor) {
                return redirect()->route('login');
            } else {
                return view('contractor.homepage')->with(compact('contractor','notifications','notification_count'));
                // return $notification_count;

            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }

    }
    public function mark_as_read($id)
    {
        try{
            $contractor = User::select()->find(Auth::user()->id);
            $notification = Notification::select()->find($id);

            if (!($contractor && $notification)) {
                return redirect()->route('login');
            } else {

                $notification->seen = 1;
                $notification->save();

                $notifications = Notification::where('notification_type', '=', "upload")->orderBy('id', 'DESC')->get();
                $notification_count = Notification::where('seen',"=",0)->count();

                return view('contractor.homepage')->with(compact('contractor','notifications','notification_count'));
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }

    }
    public function read_all(Request $request)
    {
        try{
            $contractor = User::select()->find(Auth::user()->id);
            $notifications_unreaded = Notification::where('notification_type', '=', "upload")->where('seen', '=', 0)->orderBy('id', 'DESC')->get();

            if (!$contractor) {
                return redirect()->route('login');
            } else {
                foreach($notifications_unreaded as $notification){
                    $notification->seen = 1;
                    $notification->save();
                }
            $notifications = Notification::where('notification_type', '=', "upload")->orderBy('id', 'DESC')->get();
            $notification_count = Notification::where('seen',"=",0)->count();

                return view('contractor.homepage')->with(compact('contractor','notifications','notification_count'));
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }

    }

    public function explor()
    {
        $id = Auth::user()->id;
        try{
            $contractor = User::select()->find($id);
            $props = Property::all();
            $project = Project::all();
            $notifications = Notification::where('notification_type', '=', "upload")->orderBy('id', 'DESC')->get();
            $notification_count = Notification::where('seen',"=",0)->count();

            if (!$contractor && !$props && !$project) {
                return redirect()->route('login');
            } else {
                return view('contractor.explor')->with(compact('contractor','props','project','notifications','notification_count'));
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }

    }

    public function your_project()
    {
        try{
            $user= Auth::user();
            $contractor = User::select()->find($user->id);
            $project = Project::where('belong_to_contractor', '=', $user->id)->where('accepted', '=', '1')->with(['props'])->get();
            $notifications = Notification::where('notification_type', '=', "upload")->orderBy('id', 'DESC')->get();
            $notification_count = Notification::where('seen',"=",0)->count();

            if (!$contractor && !$project) {
                return redirect()->route('login');
            } else {
                return view('contractor.your_project')->with(compact('contractor','project','notifications','notification_count'));
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }

    public function interested_projects()
    {
        try{
            $user= Auth::user();
            $contractor = User::select()->find($user->id);
            $project = Project::whereHas('comments', function($query) use($user) {
                $query->whereUserId($user->id);
            })->with(['props'])->get();

            $notifications = Notification::where('notification_type', '=', "upload")->orderBy('id', 'DESC')->get();
            $notification_count = Notification::where('seen',"=",0)->count();


            if (!$contractor && !$project) {
                return redirect()->route('login');
            } else {
                return view('contractor.interested')->with(compact('contractor','project','notifications','notification_count'));
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
    // Accept => Add To your Projects
    public function accept($id,Request $request)
    {
        $user_id= Auth::user()->id;
        $contractor = User::find($user_id);
        $add_pro = Project::find($id);
        $props = Property::where('project_id', '=', $id)->with(['project'])->get();
        $project = Project::where('id', '=', $id)->with(['props'])->get();
        $comments = Comment::where('project_id',$id)->where('user_id',$user_id)->with(['replies','users'])->get();

        try{

            if (!$contractor) {
                return redirect()->route('login');
            }
            if (!$add_pro) {
                return redirect()->route('contractor.explor');
            }
            $request->request->add(['user_id'=>$user_id]);
            // Project Accept
            $add_pro->accepted = 1;
            $add_pro->belong_to_contractor = $request['user_id'];
            $add_pro->save();

            // return $add_pro;
            return redirect()->route('contractor.your_project')->with(['success' => 'Added To Your Projects Successfully']);

        } catch (\Exception $e) {
            return redirect()->route('contractor.your_project')->with('هناك خطأ يرجي المحاوله في وقت اخر');
            // return "no";
        }


        // return $comments;

    }
    // ==========================
    // UnAccept => Add To your Projects
    public function unaccept($id)
    {
        $user_id= Auth::user()->id;
        $contractor = User::find($user_id);
        $add_pro = Project::find($id);
        $project = Project::where('id', '=', $id)->with(['props'])->get();

        try{

            if (!$contractor) {
                return redirect()->route('login');
            }
            if (!$add_pro) {
                return redirect()->route('contractor.explor');
            }
            // Project Accept
            $add_pro->accepted = 0;
            $add_pro->belong_to_contractor = null;
            $add_pro->save();
            // return $add_pro;

            return redirect()->route('contractor.your_project')->with(['success' => 'Unaccepted Successfully']);

        } catch (\Exception $e) {
            return redirect()->route('contractor.your_project')->with('هناك خطأ يرجي المحاوله في وقت اخر');
            // return "no";
        }


        // return $comments;

    }
    // ==========================

    public function profile()
    {
        $profile_picture = Auth::user()->profile_picture;
        $notifications = Notification::where('notification_type', '=', "upload")->orderBy('id', 'DESC')->get();
        $notification_count = Notification::where('seen',"=",0)->count();

        if(Auth::check()){
            try{
                $contractor = User::select()->find(Auth::user()->id);
                if (!$contractor) {
                    return redirect()->route('login');
                } else {
                    return view('contractor.profile', compact('contractor','profile_picture','notifications','notification_count'));
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
        $contractor = User::select()->find(Auth::user()->id);
        if (!$contractor) {
            return redirect()->route('contractor.profile')->with(['error' => 'هذه اللغة غير موجوده']);
        } else {
            return view('contractor.edit', compact('contractor'));
        }
    }


    public function details($id)
    {
        $user = Auth::user();

        $users = User::find($user->id);
        $props = Property::where('project_id', '=', $id)->with(['project'])->get();
        $project = Project::all()->where('id', '=', $id);
        $comments = Comment::where('project_id',$id)->where('user_id',$user->id)->with(['replies','users'])->get();
        $payment = Transaction::where('project_id', '=', $id)->get();
        $project_id = $id;
        $notifications = Notification::where('notification_type', '=', "upload")->orderBy('id', 'DESC')->get();
        $notification_count = Notification::where('seen',"=",0)->count();


        $num_of_comments = Comment::where('user_id',"=",Auth::user()->id)->where('project_id',$id)->get();

        if (!$users && !$props && !$project && !$comments_of_users && !$replies_of_users) {
            return redirect()->back();
        } else {
            return view('contractor.details')->with(compact('users','props','project','comments','project_id','num_of_comments','payment','notifications','notification_count'));
            // return $payment;
        }

        // return $props;


    }

    public function payment($project_id){
        try{
            $contractor = User::select()->find(Auth::user()->id);
            $project = Project::find($project_id);
            $props = Property::where('project_id', '=', $project_id)->get();
            if (!$contractor) {
                return redirect()->route('login');
            } else {
                return view('contractor.payment')->with(compact('contractor','project_id','props','project'));

            }

        } catch (\Exception $e) {
            return redirect()->route('login');
            // return 'no';
        }
    }

    public function paymentDefault(){
        try{
            $contractor = User::select()->find(Auth::user()->id);
            if (!$contractor) {
                return redirect()->route('login');
            } else {
                return view('contractor.paymentDefault')->with(compact('contractor'));
                // return $customer;
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
            // return "no";
        }
    }

}
