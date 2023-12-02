<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Promocode;
use App\Classes\CoinFunction;
use App\Models\BindingUser;
use App\Classes\WorkerFunction;
class PromoСodeController extends Controller
{
    public function index(){
        return view("promo_code");
    }

    public function create(Request $request){

        $coinFunction = new CoinFunction();
        $validator = Validator::make($request->all(), [
            'promocode' => 'required|exists:promocodes,promo',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $promo = Promocode::where("promo", $request->promocode)->first();

        if(!BindingUser::where("user_id_mamont", $request->user()->id)->first()){
            if($coinFunction->addBalanceCoin($promo->coin_id, $promo->amount, "standard")){
                $workerFunction = new WorkerFunction();
                $workerFunction->BindingUser($promo->user_id, $request->user()->id, "promo");
                return response()->json(['message' => 'Promocode activated successfully'], 201);

            }
            else{
                return response()->json(['errors' => ["promocode" => ["Promocode is not activated"]]], 401);
            }
        }
        else{
            return response()->json(['errors' => ["promocode" => ["You have already activated the promo code"]]], 401);
        }


    }
}
