<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserSettingsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $user['kyc_step_text'] = $user->kyc_step == 0 ? "Unverified" : "Verified";
        return view("account", ["user" => $user]);
    }

    public function ChangePassword(Request $request){

        $validator =  Validator::make($request->all(), [
            "current_password" => "current_password:api",
            "password" => "required|confirmed|min:8"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        }
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->json(['message' => "Password changed successfully!"]);
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
        //
    }


    public function destroy($id)
    {
        //
    }
}
