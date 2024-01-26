<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\CourseFunction;
use App\Classes\Telegram;
class indexCotroller extends Controller
{
    public function index(Request $request){
        $ref = $request->get("use");
        if($ref){
            session(['ref' => $ref]);
        }

        $CF = new CourseFunction();
        $coins = ["bitcoin", "ethereum", "bitcoin-cash", "litecoin", "cardano", "dash"];
        $coins_prices = $CF->getCoinsPrices($coins);
        return view("main", ["coins_prices" => $coins_prices]);
    }
}
