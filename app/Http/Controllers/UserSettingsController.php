<?php

namespace App\Http\Controllers;

use App\Models\kyc_application;
use App\Models\User;
use Carbon\Carbon;
use Cassandra\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserSettingsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user['kyc_step_text'] = $user->kyc_step == 0 ? "Unverified" : "Verified";
        return view("account", ["user" => $user]);
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

        $date = Carbon::parse($request->dateOfBrith);
        $KycApp = new kyc_application();
        $KycApp->sex = $request->sex;
        $KycApp->user_id = $request->user()->id;
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
}
