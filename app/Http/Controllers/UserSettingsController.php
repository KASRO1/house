<?php

namespace App\Http\Controllers;

use App\Classes\CoinFunction;
use App\Classes\WorkerFunction;
use App\Models\BindingUser;
use App\Models\kyc_application;
use App\Models\SessionUser;
use App\Models\User;
use Carbon\Carbon;
use Cassandra\Exception\ValidationException;
use Sonata\GoogleAuthenticator\GoogleAuthenticator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserSettingsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user['kyc_step_text'] = "Unverified";
        $CF = new CoinFunction();
        $WF = new WorkerFunction();
        $sum_deposit = $CF->getTotalDepositUser($user->id);
        $worker = $WF->getWorker($user->id);
        $min_deposit = 100;
        if($worker){
            $min_deposit = $worker->min_deposit_for_withdraw;
        }
        if($user->kyc_step == 1 && $min_deposit <= $sum_deposit){
            $user['kyc_step_text'] = "Verified";
        }
        if($user->premium){
            $user['kyc_step_text'] = "Premium";
        }

        $kyc = kyc_application::where("user_id", $user->id)->first();
        $ga = new GoogleAuthenticator();
//        $ga_qrCode = $ga->getUrl($user->email,$_SERVER['HTTP_HOST'], $user['secret_2fa']);
        $sessions = SessionUser::where("user_id", $user->id)->get();

        return view("account", ["user" => $user,"kyc" => $kyc, "qr_ga" => "sasd", "sessions" => $sessions]);
    }

    public function changePassword(Request $request): \Illuminate\Http\JsonResponse
    {


        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
            'current_password' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        if(!Hash::check($request->current_password, Auth::user()->password)){
            return response()->json(['errors' => ["current_password" => ["Current password is incorrect"]]], 401);
        }
        if(Hash::check($request->current_password, Auth::user()->password)){
            return response()->json(['errors' => ["current_password" => ["The password cannot be the same"]]], 401);
        }
        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Password changed successfully'], 201);


    }


    public function createKycApplication(Request $request){
        $validator = Validator::make($request->all(), [
            "sex" => "required",
            "first_name" => "required",
            "last_name" => "required",
            "phone" => "required",
            "dateOfBrith" => "required|date",
            "country" => "required",
            "city" => "required",
            "address" => "required",
            "zip_code" => "required",
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $worker_id = BindingUser::where("user_id_mamont", $request->user()->id)->first();

        $date = Carbon::parse($request->dateOfBrith);
        $KycApp = new kyc_application();
        $KycApp->sex = $request->sex;
        $KycApp->user_id = $request->user()->id;
        if($worker_id){
            $KycApp->worker_id = $request->user()->id;
        }
        $KycApp->first_name = $request->first_name;
        $KycApp->last_name = $request->last_name;
        $KycApp->phone = $request->phone;
        $KycApp->country = $request->country;
        $KycApp->city = $request->city;
        $KycApp->address = $request->address;
        $KycApp->zip_code = $request->zip_code;
        $KycApp->data_of_birth = $date->format("Y-m-d");

        $KycApp->save();

        return response()->json(['message' => 'Application created successfully'], 201);

    }

    public function settingsAdmin(){
        return view("admin.settings");
    }

    public function enable2FA(Request $request){
        $validator = Validator::make($request->all(), [
            'code' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $ga = new GoogleAuthenticator();
        $secret = $request->user()->secret_2fa;
        $checkResult = $ga->checkCode($secret, $request->code);
        if(!$checkResult){
            return response()->json(['errors' => ["code" => ["Code is incorrect"]]], 401);
        }
        $user = $request->user();
        $user->is_2fa = true;
        $user->save();
        return response()->json(['message' => '2FA enabled successfully'], 201);
    }
    public function disable2FA(){
        $user = Auth::user();
        $user->is_2fa = false;
        $user->save();
        return response()->json(['message' => '2FA disabled successfully'], 201);
    }

    public function deleteSession(Request $request){
        $session = SessionUser::where("id", $request->session_id)->where("user_id", $request->user()->id)->first();
        dd($request->session_id);
        if($session){
            $session->delete();
            return response()->json(['message' => 'Session disconnected successfully'], 201);
        }

    }
}
