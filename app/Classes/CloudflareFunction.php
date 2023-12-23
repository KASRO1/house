<?php

namespace App\Classes;
use Cloudflare\API\Auth\APIKey;
use Cloudflare\API\Adapter\Guzzle;
use Cloudflare\API\Endpoints\EndpointException;
use Cloudflare\API\Endpoints\Zones;
use Cloudflare\API\Endpoints\DNS;

class CloudflareFunction{
    function add_domain_cloudflare($domain)
    {
        $key = new APIKey(getenv('CLOUDFLARE_EMAIL'), getenv('CLOUDFLARE_API'));
        $adapter = new Guzzle($key);
        $zone = new Zones($adapter);
        $dns = new DNS($adapter);
        $response = $zone->addZone($domain,getenv('SERVER_IP'));
        $zone_id = $response->id;
        $ns_list = $response->name_servers;
        $dns->addRecord($zone_id, 'A', $domain, getenv('SERVER_IP'), 1);
        $dns->addRecord($zone_id, 'A', '*' , getenv('SERVER_IP'), 1);
        $data = ["zone_id" => $zone_id, "ns_list" => $ns_list];
        return $data;
    }

//    function delete_domain_cloudflare($domain): bool
//    {
//        $key = new APIKey(CLOUDFLARE_EMAIL, CLOUDFLARE_API_KEY);
//        $adapter = new Guzzle($key);
//        $zone = new Zones($adapter);
//
//        try {
//            $response = $zone->getZoneID($domain);
//
//
//        } catch (EndpointException $e) {
//            return false;
//        }
//
//        if (!empty($response)) {
//            $zone_id = $response;
//            if(delete_domain($zone_id)){
//                $zone->deleteZone($zone_id);
//                return true;
//            }
//        }
//        return false;
//
//
//    }

}
