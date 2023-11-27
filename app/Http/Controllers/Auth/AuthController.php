<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
            'remember' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $remember = $request->remember == 'true' ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return response()->json(['message' => 'User logged in successfully'], 201);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 200);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
