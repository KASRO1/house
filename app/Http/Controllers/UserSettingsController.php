<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        dd($request->all());
    }


    public function destroy($id)
    {
        //
    }
}
