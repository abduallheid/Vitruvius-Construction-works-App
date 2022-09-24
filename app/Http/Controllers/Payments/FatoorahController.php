<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\FatoorahService;
use App\Models\Transaction;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use Config;

class FatoorahController extends Controller
{
    private $fatoorahServices;

    public function __construct(FatoorahService $fatoorahServices){
        $this->fatoorahServices = $fatoorahServices; // Inject fatoorahServices in Controller and take instance from it
    }


    public function payOrder(Request $request){

        $invoice_value = $request->salary;
        $name = $request->name;
        $email = $request->email;
        $project = $request->project_id;

        //Fill POST fields array
        $data = [
            //Fill required data
            'NotificationOption' => 'LNK', //'SMS', 'EML', or 'ALL'
            'InvoiceValue'       => $invoice_value,
            'CustomerName'       => $name,
            'DisplayCurrencyIso' => 'SAR',
            'CustomerEmail'      => $email,
            'CallBackUrl'        => 'http://127.0.0.1:8000/api/success_call_back',
            'ErrorUrl'           => 'http://127.0.0.1:8000/api/failed_call_back',
            'Language'           => 'en', //or 'ar'

        ];


        $returned_data = $this->fatoorahServices->sendPayment($data);

        Transaction::create([
            'invoice_id' => $returned_data['Data']['InvoiceId'],
            'user_id' => $request['user_id'],
            'salary' => $invoice_value,
            'project_id'=> $project,
        ]);
        $redirect_link = $returned_data['Data']['InvoiceURL'];
        return redirect()->away($redirect_link);

    }

    public function successCallBack(Request $request){
        $data=[];
        $data['Key']=$request->paymentId;
        $data['KeyType']='paymentId';

        $pay_status = $this->fatoorahServices->getPaymentStatus($data);
        $invoice_id = $pay_status['Data']['InvoiceId'];

        $saved_pay = Transaction::where('invoice_id',$invoice_id)->get();
        $saved_pay_invoice_id = $saved_pay[0]->invoice_id;
        $project_id = $saved_pay[0]->project_id;
        $user_id = $saved_pay[0]->user_id;
        $role = User::find($saved_pay[0]->user_id);

        if($saved_pay_invoice_id === $invoice_id){
            if($role->kind == 'customer'){
                $project = Project::find($project_id);
                $project->payment_status = 1;
                $project->save();

                return redirect()->route('customer.payment', $project_id)->with('success','Payment done Successfully');

            }else{

                $project = Project::find($project_id);
                $project->contractor_tax = 1;
                $project->save();
                return redirect()->route('contractor.payment', $project_id)->with('success','Payment done Successfully');

            }
        }else{
            return redirect()->route('notfound');
        }
        // return $role;


    }

    public function failCallBack(Request $request){
        $data=[];
        $data['Key']=$request->paymentId;
        $data['KeyType']='paymentId';

        $pay_status = $this->fatoorahServices->getPaymentStatus($data);
        $invoice_id = $pay_status['Data']['InvoiceId'];

        $saved_pay = Transaction::where('invoice_id',$invoice_id)->get();
        $saved_pay_invoice_id = $saved_pay[0]->invoice_id;
        $project_id = $saved_pay[0]->project_id;
        $user_id = $saved_pay[0]->user_id;
        $role = User::find($saved_pay[0]->user_id);

        $error = "fail";
        if($saved_pay_invoice_id === $invoice_id){
            if($role->kind == 'customer'){
                return redirect()->route('customer.payment', $project_id)->with($error);

            }else{

                return redirect()->route('contractor.payment', $project_id)->with($error);
            }
        }else{
            return redirect()->route('notfound');
        }
        // return $project_id;


    }
}
