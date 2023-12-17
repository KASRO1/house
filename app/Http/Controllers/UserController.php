<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Classes\WorkerFunction;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function BindingUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id_mamont' => 'required|unique:binding_users,user_id_mamont',
        ]);


        $user = User::where('email', $request->user_id_mamont)
            ->orWhere('id', $request->user_id_mamont)
            ->first();

        if (!$user) {
            return response()->json(['errors' => ["user_id_mamont" => ["Пользователь не найден"]]], 401);
        }

        if ($request->user()->email == $request->user_id_mamont || $request->user()->id == $request->user_id_mamont) {
            return response()->json(['errors' => ["user_id_mamont" => ["Пользователь уже привязан"]]], 401);
        }

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $workerFunction = new WorkerFunction();
        if ($workerFunction->BindingUser($request->user()->id, $user->id, "manually")) {
            return response()->json(['message' => 'Пользователь успешно привязан'], 201);
        }
    }

}
