<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Http\Requests\RegisterRequest;
use Storage;
use Response;
use PDF;


class HomeController extends Controller
{
    public function register_user(RegisterRequest $request)
    {

        try{
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'kind' => $request['kind'],
                'address' => $request['address'],
                'national_id' => $request['national_id'],
                'tax_record' => $request['tax_record'],
                'phone' => $request['phone'],
            ]);
            return redirect()->route('login');
            // return $request;

        } catch (\Exception $e) {
            return $e->getMessage();
            // return "no";
        }
    }


    public function checkUserType(){
        if(!Auth::user()){
            return redirect()->route('login');
        }
        if(Auth::user()->kind === 'customer'){
            $user_customer = User::select()->find(Auth::user()->id);
            return redirect()->route('customer.homepage')->with(compact('user_customer'));
        }
        if(Auth::user()->kind === 'contractor'){
            $user_contractor = User::select()->find(Auth::user()->id);
            return redirect()->route('contractor.homepage')->with(compact('user_contractor'));
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login')->with(['msg_body' => 'You signed out!']);

    }


}

