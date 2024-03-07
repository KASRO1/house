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

    function check_domain_status_cloudflare($zoneId)
    {
        $key = new APIKey(getenv('CLOUDFLARE_EMAIL'), getenv('CLOUDFLARE_API'));
        $adapter = new Guzzle($key);
        $zone = new Zones($adapter);

        try {
            $zoneInfo = $zone->getZoneByID($zoneId);

            return $zoneInfo->result->status;
        } catch (\Exception $e) {

            throw $e;
        }
    }
    function get_zoneid($domain)
    {
        $key = new APIKey(getenv('CLOUDFLARE_EMAIL'), getenv('CLOUDFLARE_API'));
        $adapter = new Guzzle($key);
        $zone = new Zones($adapter);

        try {
            $response = $zone->getZoneID($domain);
            return $response;

        } catch (EndpointException $e) {
            return false;
        }
    }
    function get_ns_list($domain)
    {

        $key = new APIKey(getenv('CLOUDFLARE_EMAIL'), getenv('CLOUDFLARE_API'));
        $adapter = new Guzzle($key);
        $zone = new Zones($adapter);

        try {
            $response = $zone->getZoneID($domain);
            $zone_id = $response;
            $response = $zone->getZoneByID($zone_id);
            $ns_list = $response->result->name_servers;
            return $ns_list;

        } catch (EndpointException $e) {
            return false;
        }
    }

    function delete_domain_cloudflare($domain): bool
    {
        $key = new APIKey(getenv('CLOUDFLARE_EMAIL'), getenv('CLOUDFLARE_API'));
        $adapter = new Guzzle($key);
        $zone = new Zones($adapter);

        try {
            $response = $zone->getZoneID($domain);


        } catch (EndpointException $e) {
            return false;
        }

        if (!empty($response)) {
            $zone_id = $response;
                $zone->deleteZone($zone_id);
                return true;

        }
        return false;


    }

}
