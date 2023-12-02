<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\CoinFunction;
use Illuminate\Support\Facades\Validator;
use function Illuminate\Events\queueable;

class BalanceController extends Controller
{
    public function swapBalance(Request $request){
        $coinFunction = new CoinFunction();
        $validator = Validator::make($request->all(), [
            'from' => 'required',
            'to' => 'required',
            'quantity' => 'required|numeric|min:0.00000001',
        ]);
    }
}
