<?php

namespace App\Http\Controllers;

use App\Models\BindingUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $Mamonts['data'] = BindingUser::where("user_id_worker", auth()->user()->id)->get()->toArray();
        $Mamonts['statistic']['total_mamont']['labels'] = [];
        foreach ($Mamonts['data'] as $key => $mamont) {
            $mamontProfileInfo = \App\Models\User::where("id", $mamont['user_id_mamont'])->first()->toArray();
            $mamontProfileInfo['status_online'] = true;
            if($mamontProfileInfo['last_online'] < now()->subMinutes(5)){
                $mamontProfileInfo['status_online'] = false;
            }

            if($mamont['type'] === "promo"){
                $Mamonts['data'][$key]['type'] = "Промокод";
            }
            elseif($mamont['type'] === "manually"){
                $Mamonts['data'][$key]['type'] = "Ручная привязка";
            }
            elseif($mamont['data']['type'] === "domain"){
                $Mamonts['data'][$key]['type'] = "Домен";
            }
            $shortName = substr($mamontProfileInfo['email'], 0, 4);

            $shortNameWithDots = $shortName . '...';

            $Mamonts['data'][$key]['mamontProfileInfo'] = $mamontProfileInfo;
            $date = new Carbon($mamont['created_at']);
            $date = $date->format('d M');
            $Mamonts['statistic']['total_mamont']['labels'][] = '"' . $date . '"';
            $Mamonts['statistic']['total_mamont']['data'][] = 1;

        }

        $Mamonts['statistic']['total_mamont']['labels'] = join(", ", $Mamonts['statistic']['total_mamont']['labels']);
        $Mamonts['statistic']['total_mamont']['data'] = join(", ", $Mamonts['statistic']['total_mamont']['data']);


        return view("admin.index", ["mamonts" => $Mamonts]);
    }
}
