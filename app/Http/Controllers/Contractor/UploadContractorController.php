<?php

namespace App\Http\Controllers\Contractor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
use App\Models\Comment;
use App\Models\Reply;
use App\Traits\GeneralTrait;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\ProfileRequest;


class UploadContractorController extends Controller
{
    use GeneralTrait;

    public function comment($project_id,Request $request){
        $user = User::select()->find(Auth::user()->id);
        $project = Project::select()->where('user_id', '=', $user->id)->first();

        // Validation
        try {
            $rules = [
                'comment' => "required",
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back();
            }

        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }

        try {

            $request->request->add(['id'=> $user->id]);
            $request->request->add(['project_id'=>$project_id]);

            Comment::create([
                "content" => $request->comment,
                "user_id" => $request->id,
                "project_id" => $request->project_id,
            ]);
            return redirect()->back()->with('message','Created Successfully');
            // return $request;



        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }

    }


    public function reply($comment_id,Request $request){
        $user = User::select()->find(Auth::user()->id);
        $comment = Comment::find($comment_id)->first();
        $project_id = $comment->project_id;

        // Validation
        try {
            $rules = [
                'reply' => "required",
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                // return redirect()->back();
                return "no";
            }

        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
        try {

            $request->request->add(['id'=> $user->id]);
            $request->request->add(['project_id'=>$project_id]);
            $request->request->add(['comment_id'=>$comment_id]);
            // $request->request->add(['profile_picture'=>$user->profile_picture]);
            // $request->request->add(['user_name'=>$user->name]);


            // Reply::create([
            //     "content" => $request->reply,
            //     "user_id" => $request->id,
            //     "project_id" => $request->project_id,
            //     "comment_id" => $request->comment_id,
            // ]);

            // $reply = Reply::select()->latest()->first();
            // $address = route('customer.details',$project_id);
            // $request->request->add(['address'=>$address]);


            // $data = [
            //     // "user_photo" => $request->profile_picture,
            //     // "user_name" => $request->user_name,
            //     // "user_id" => $request->id,
            //     // "project_id" => $request->project_id,
            //     "comment" => $comment,
            //     "address" => $request->address,
            // ];

            // event(new NewNotificationContractor($data));

            // return redirect()->back()->with('message','Created Successfully');
            return $request;

        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
    }

    public function profile_picture(Request $request){

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        // Validation
        try {
            $rules = [
                'photo' => "required|mimes:png,jpge,jpg",
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('contractor.edit');
            }

        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }

        // Save Picture
        try{
            if($request->file()) {
                $Picture_Name = time().'_'.$request->photo->getClientOriginalName();
                $request->file('photo')->move('storage/uploads/Profile_Picture/',$Picture_Name);
            }
            if($user) {
                $user->profile_picture = $Picture_Name;
                $user->save();
            }
            return redirect()->route('contractor.profile');

        } catch (\Exception $e) {

            return redirect()->route('customer.construction_style');
        }
    }

    public function update_password(UpdatePasswordRequest $request){

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        // return $request;

        // Validation
        if (Hash::check($request->old_password,$user->password) ) {
            // Save Password
            try{
                if($user) {
                    $user->password =Hash::make($request->current_password);
                    $user->save();
                }
                return redirect()->route('contractor.edit')->with('success','Password Is Updated Successfully');

            } catch (\Exception $e) {

                return redirect()->route('contractor.edit')->with('error','Password Is Failed To Update');
                // return "bad";
            }
            // return "Good";
        }else {
            return redirect()->route('contractor.edit')->with('error','Old Password Is Not Correct');
        }


    }

    public function update(ProfileRequest $request)
    {
        $id= Auth::user()->id;
        $contractor = User::find($id);

        try{

            if (!$contractor) {
                return redirect()->route('login');
            }

            $contractor->name = $request['name'];
            $contractor->address = $request['address'];
            $contractor->phone = $request['phone'];
            $contractor->tax_record = $request['tax_record'];
            $contractor->save();

            return redirect()->route('contractor.edit')->with(['success' => 'Updated Successfully']);
            // return "yes";

        } catch (\Exception $e) {
            return redirect()->route('contractor.edit')->with(['error' => 'Faild To Update']);
            // return 'no';
        }

    }
}
