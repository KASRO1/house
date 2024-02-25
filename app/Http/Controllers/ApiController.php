<?php

namespace App\Http\Controllers;

use App\Models\ApiToken;
use App\Models\Coin;
use App\Models\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function PromocodeCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.0000001',
            'symbol' => 'required|exists:coins,simple_name',
            'promocode' => 'required|unique:promocodes,promo',
            "text_error" => "required|max:255",
            "api_token" => "required|exists:api_tokens,api_token"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $promo = new Promocode();
        $promo->promo = $request->promocode;
        $promo->coin_id = Coin::where("simple_name", $request->symbol)->first()->toArray()['id_coin'];
        $promo->amount = $request->amount;
        $promo->user_id = ApiToken::where("api_token", $request->api_token)->first()->worker_id;
        $promo->text = $request->text_error;
        $promo->save();

        return response()->json(['message' => 'Promocode created successfully'], 201);


    }

    public function getPromocodesStatistic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'api_token' => 'required|exists:api_tokens,api_token'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $user_id = ApiToken::where("api_token", $request->api_token)->first()->worker_id;
        $promocodes = Promocode::where("user_id", ApiToken::where("api_token", $request->api_token)->first()->worker_id)->get();
        $promocodes = $promocodes->map(function ($item) {
            return [
                "promocode" => $item->promo,
                "coin" => Coin::where("id_coin", $item->coin_id)->first()->toArray()['simple_name'],
                "amount" => $item->amount,
                "text_error" => $item->text
            ];
        });
        $promocodes['totalPromo'] = count($promocodes);
        $promocodes['totalPromoLastWeek'] = count(Promocode::where("user_id", $user_id)->where("created_at", ">", date("Y-m-d H:i:s", strtotime("-7 days")))->get()->toArray());
        $promocodes['totalUnUsedPromo'] = count(Promocode::where("user_id", $user_id)->where("activations", 0)->get()->toArray());
        $promocodes['totalUnUsedPromoLastWeek'] = count(Promocode::where("user_id", $user_id)->where("activations", 0)->where("created_at", ">", date("Y-m-d H:i:s", strtotime("-7 days")))->get()->toArray());

        return response()->json($promocodes, 201);
    }

    public function getPromocodeStatistic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'promocode' => 'required|exists:promocodes,promo',
            "api_token" => "required|exists:api_tokens,api_token"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $promocode = Promocode::where("promo", $request->promocode)->first();
        $promocode = [
            "promocode" => $promocode->promo,
            "coin" => Coin::where("id_coin", $promocode->coin_id)->first()->toArray()['simple_name'],
            "amount" => $promocode->amount,
            "text_error" => $promocode->text,
            "activations" => $promocode->activations
        ];
        return response()->json($promocode, 201);
    }

    public function deletePromo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'promocode' => 'required|exists:promocodes,promo',
            "api_token" => "required|exists:api_tokens,api_token"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $promocode = Promocode::where("promo", $request->promocode)->first();
        $promocode->delete();
        return response()->json(['message' => 'Promocode deleted successfully'], 201);
    }

}
