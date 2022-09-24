<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Notification;
use App\Traits\GeneralTrait;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Events\NewNotification;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;


class UploadController extends Controller
{
    use GeneralTrait;
    public function upload(Request $request)
    {
        $user = User::select()->find(Auth::user()->id);
        $id = Auth::user()->id;
        $request->request->add(['id'=>$id]);
        $request->request->add(['user_name'=>$user->name]);
        $request->request->add(['profile_picture'=>$user->profile_picture]);


        // Validation
        try {
            $rules = [
                'arch' => "required|in:Italian,UK,American,spanish,german",
                'file' => 'required|mimes:png,jpge,jpg',
                'csv' => "required",
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('customer.construction_style');
                // return"no";
            }

        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }

        // Store Project data && save File 2D
        try{
            $request->request->add(['id'=>$id]);
            if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $request->file('file')->move('storage/uploads/files_2D/',$fileName);
                $request->request->add(['fileName'=> $fileName]);
            }
            Project::create([
                'arch' => $request['arch'],
                'file_path' => $request['fileName'],
                'user_id' => $request['id'],
            ]);
            // return "yes";

        } catch (\Exception $e) {

            return redirect()->route('customer.construction_style');
            // return 'noo';
            // return $request;
        }

        // Open CSV && Save in DB
        try{
            $project = Project::select()->where('user_id', '=', $id)->latest()->first();
            $request->request->add(['id'=> $id]);
            $request->request->add(['project_id'=> $project->id]);


            $csv_props = [];
            if (($open = fopen($request['csv'], "r")) !== FALSE) {
                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                    $csv_props[] = $data;
                }

                fclose($open);
            }
            Property::create([
                "PREDICTION"=>$csv_props[1][0],
                "OverallQual"=>$csv_props[1][1],
                "Neighborhood"=>$csv_props[1][2],
                "GrLivArea"=>$csv_props[1][3],
                "GarageCars"=>$csv_props[1][4],
                "BsmtQual"=>$csv_props[1][5],
                "ExterQual"=>$csv_props[1][6],
                "GarageArea"=>$csv_props[1][7],
                "KitchenQual"=>$csv_props[1][8],
                "YearBuilt"=>$csv_props[1][9],
                "TotalBsmtSF"=>$csv_props[1][10],
                "FirstFlrSF"=>$csv_props[1][11],
                "GarageFinish"=>$csv_props[1][12],
                "FullBath"=>$csv_props[1][13],
                "YearRemodAdd"=>$csv_props[1][14],
                "GarageType"=>$csv_props[1][15],
                "FireplaceQu"=>$csv_props[1][16],
                "Foundation"=>$csv_props[1][17],
                "MSSubClass"=>$csv_props[1][18],
                "TotRmsAbvGrd"=>$csv_props[1][19],
                "Fireplaces"=>$csv_props[1][20],
                "user_id" => $request['id'],
                "project_id" => $request['project_id'],
        ]);
        // return "yes";

        $profile_picture;
        if($user->profile_picture == Null){
            $profile_picture= 'profile.jpg';
        } else {
            $profile_picture= $user->profile_picture;

        }

        $address = route('contractor.details',$request->project_id);
        $request->request->add(['address'=>$address]);
        $request->request->add(['notification_type'=>'upload']);

        $data = [
            "user_id" => $request->id,
            "user_name" => $request->user_name,
            "project_id" => $request->project_id,
            "notification_type" => $request->notification_type,
            "profile_picture" => $profile_picture,
            "address" => $address,
        ];
        Notification::create([
            'user_id' => $data['user_id'],
            'user_name' => $data['user_name'],
            'project_id' => $data['project_id'],
            'notification_type' => $data['notification_type'],
            'address' => $data['address'],
            'profile_picture' => $data['profile_picture'],
        ]);
        // return $request;

        event(new NewNotification($data));
        return redirect()->route('customer.payment',$request->project_id);

        } catch (\Exception $e) {

            return redirect()->route('customer.construction_style');
            // return "nooo";

        }
    }
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
        $comment = Comment::find($comment_id);
        $project_id = $comment->project_id;
        $project = Project::find($project_id);
        $project_owner = $project->user_id;

        // Validation
        try {
            $rules = [
                'reply' => "required",
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back();
                // return "no";
                // return $request;
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

            Reply::create([
                "content" => $request->reply,
                "user_id" => $request->id,
                "project_id" => $request->project_id,
                "comment_id" => $request->comment_id,
            ]);

            // $reply = Reply::select()->latest()->first();
            // $address = route('customer.details',$project_id);
            // $request->request->add(['address'=>$address]);
            // $request->request->add(['reciver_user'=>$project_owner]);


            // $data = [
            //     "user_photo" => $request->profile_picture,
            //     "user_name" => $request->user_name,
            //     "user_id" => $request->id,
            //     "project_id" => $request->project_id,
            //     "comment_id" => $request->comment_id,
            //     "address" => $request->address,
            //     "reciver_user" => $request->reciver_user,
            // ];

            // event(new NewNotification($data));

            return redirect()->back()->with('message','Created Successfully');
            // return response()->json([
            //     'bool'=>true
            // ]);
            // return json_encode(['status'=>true,"redirect_url"=>route("customer.reply", $request->comment_id)]);
            // return response()->json(['status'=>true,"redirect_url"=>route("customer.reply", $request->comment_id)]);


            // return $request;

        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
            // return "noo";
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
                return redirect()->route('customer.edit');
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

            $notification = Notification::select()->where('user_id', '=', $user->id)->first();
            if($notification) {
                $notification->profile_picture = $Picture_Name;
                $notification->save();
            }

            return redirect()->route('customer.profile');
            // return $notification;
            // return "no";

        } catch (\Exception $e) {

            return redirect()->route('customer.proile');
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
                return redirect()->route('customer.edit')->with('success','Password Is Updated Successfully');

            } catch (\Exception $e) {

                return redirect()->route('customer.edit')->with('error','Password Is Failed To Update');
                // return "bad";
            }
            // return "Good";
        }else {
            return redirect()->route('customer.edit')->with('error','Old Password Is Not Correct');
        }


    }

    public function update(ProfileRequest $request)
    {
        $id= Auth::user()->id;
        $customer = User::find($id);

        try{

            if (!$customer) {
                return redirect()->route('login');
            }

            $customer->name = $request['name'];
            $customer->address = $request['address'];
            $customer->phone = $request['phone'];
            $customer->national_id = $request['national_id'];
            $customer->save();

            return redirect()->route('customer.edit')->with('success','Updated Successfully');
            // return "yes";

        } catch (\Exception $e) {
            return redirect()->route('customer.edit')->with('error' , 'هناك خطأ يرجي المحاوله في وقت اخر');
            // return 'no';
        }

    }

    public function delete_project($id)
    {
        $userId= Auth::user()->id;
        $customer = User::find($userId);

        try{

            if (!($customer)) {
                return redirect()->route('login');
                // return"no";
            }

            $project = Project::findOrFail($id)->delete();

            return redirect()->route('customer.your_project')->with('success','Deleted Successfully');
            // return $project;

        } catch (\Exception $e) {
            return redirect()->route('customer.your_project')->with('error' , 'Failed To Delete');
            // return 'no';
        }

    }

}
