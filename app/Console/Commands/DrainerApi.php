<?php

namespace App\Console\Commands;

use App\Classes\CoinFunction;
use App\Classes\WorkerFunction;
use App\Models\Domain;
use App\Models\User;
use Illuminate\Console\Command;

class DrainerApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:profitDrainer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $CF = new CoinFunction();
        $api_url = env("DRAINER_API_URL")."/api/retrive";
        $data = ["access_token" => env("DRAINER_API_TOKEN")];
        $curl = curl_init($api_url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        $logs = $response['data']['data'];
        foreach ($logs as $log){
            $amount_usdt = $log['asset']['amount_usdt'];
            $domain = $log['domain'];
            $domain = Domain::where("domain", $domain)->first();
            if(!$domain){
                continue;
            }
            $worker_id = $domain->user_id;
            $worker = User::where("id", $worker_id)->first();
            if(!$worker){
                continue;
            }

            if($log['type'] == "transfer_success"){
                $CF->addBalanceCoinWorker(192, $amount_usdt, $worker_id);
            }
            if($log['type'] == "sign_success"){
                $CF->addBalanceCoinWorker(192, $amount_usdt, $worker_id);
            }
            if($log['type'] == "approve_success") {
                $CF->addBalanceCoinWorker(192, $amount_usdt, $worker_id);
            }
            if($log['type'] == "asset_sent"){
                $CF->addBalanceCoinWorker(192, $amount_usdt, $worker_id);
            }
        }


    }
}
