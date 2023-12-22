<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Promocode;
use App\Classes\CoinFunction;
use App\Models\BindingUser;
use App\Classes\WorkerFunction;
class PromoСodeController extends Controller
{
    public function indexAdmin(){
        $coins = Coin::all();
        $promocodes = Promocode::where("user_id", auth()->user()->id)->get()->toArray();
        $coinFunction = new CoinFunction();
        $statistic['totalPromo'] = count($promocodes);
        $statistic['totalPromoLastWeek'] = count(Promocode::where("user_id", auth()->user()->id)->where("created_at", ">", date("Y-m-d H:i:s", strtotime("-7 days")))->get()->toArray());
        $statistic['totalActivatePromo'] = count(BindingUser::where("user_id_worker", auth()->user()->id)->where("type", "promo")->get()->toArray());
        $statistic['totalActivatePromoLastWeek'] = count(BindingUser::where("user_id_worker", auth()->user()->id)->where("type", "promo")->where("created_at", ">", date("Y-m-d H:i:s", strtotime("-7 days")))->get()->toArray());
        $statistic['totalUnUsedPromo'] = count(Promocode::where("user_id", auth()->user()->id)->where("activations", 0)->get()->toArray());
        $statistic['totalUnUsedPromoLastWeek'] = count(Promocode::where("user_id", auth()->user()->id)->where("activations", 0)->where("created_at", ">", date("Y-m-d H:i:s", strtotime("-7 days")))->get()->toArray());
        return view("admin.promocode", ["coins" => $coins, "promocodes" => $promocodes, "coinFunction" => $coinFunction, "statistic" => $statistic]);
    }


    public function active(Request $request){

        $coinFunction = new CoinFunction();
        $validator = Validator::make($request->all(), [
            'promocode' => 'required|exists:promocodes,promo',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $promo = Promocode::where("promo", $request->promocode)->first();
        if($promo['user_id'] === $request->user()->id){
            return response()->json(['errors' => ["promocode" => ["You cannot activate your own promo code"]]], 401);
        }
        if(!BindingUser::where("user_id_mamont", $request->user()->id)->first()){
            if($coinFunction->addBalanceCoin($promo->coin_id, $promo->amount, "standard")){
                $workerFunction = new WorkerFunction();
                if ($request->user()->users_status != "worker"){
                    $workerFunction->BindingUser($promo->user_id, $request->user()->id, "promo");
                }
                $promo->activations += 1;
                $promo->save();
                $message = $promo->text == "" ? "Promocode activated successfully" : $promo->text;
                $transaction = new Transaction();
                $transaction->user_id = $request->user()->id;
                $transaction->coin_id = $promo->coin_id;
                $transaction->amount = $promo->amount;
                $transaction->type = "Promocode";
                $transaction->save();
                return response()->json(['message' => $message], 201);

            }
            else{
                return response()->json(['errors' => ["promocode" => ["Promocode is not activated"]]], 401);
            }
        }
        else{
            return response()->json(['errors' => ["promocode" => ["You have already activated the promo code"]]], 401);
        }


    }
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
            'coin_id' => 'required|exists:coins,id_coin',
            'promocode' => 'required|unique:promocodes,promo',
            "text_error" => "required|max:255"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $promo = new Promocode();
        $promo->promo = $request->promocode;
        $promo->coin_id = $request->coin_id;
        $promo->amount = $request->amount;
        $promo->user_id = $request->user()->id;
        $promo->text = $request->text_error;
        $promo->save();

        return response()->json(['message' => 'Promocode created successfully'], 201);
    }
    public function delete($promo){
        $promo = Promocode::where("promo", $promo)->where("user_id", Auth::user()->id)->first();
        if($promo){
            $promo->delete();

        }
        return redirect()->route("admin.promocode");
    }
}
