<?php

namespace App\Classes;

class Telegram
{
    public function sendMessage($chat_id, $text){
        $token = env("TELEGRAM_BOT_TOKEN");
        $url = "https://api.telegram.org/bot".$token."/sendMessage?parse_mode=HTML&chat_id=".$chat_id."&text=".urlencode($text);
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result, true);
    }

}
