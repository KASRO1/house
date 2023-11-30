<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(){
        $coins = Coin::all();
        return view("assets", ["coins" => $coins]);
    }

}
