<?php

namespace App\Services;

use App\Entity\IpAddress;

class IpService
{
    public function getInfo(string $ip) : ?IpAddress
    {
        $result = null;
        $ip = urlencode($ip);
        if ($curl = curl_init("http://api.2ip.ua/geo.json?ip={$ip}")) {
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $temp = curl_exec($curl);
            curl_close($curl);
            $temp = json_decode($temp);
            if ($temp != null) {
                $temp->latitude = isset($temp->latitude) ? $temp->latitude : null;
                $temp->longitude = isset($temp->longitude) ? $temp->longitude : null;
                $result = new IpAddress();
                $result->setIp($temp->ip)
                    ->setCity($temp->city)
                    ->setCityRus($temp->city_rus)
                    ->setCountry($temp->country)
                    ->setCountryRus($temp->country_rus)
                    ->setCountryCode($temp->country_code)
                    ->setRegion($temp->region)
                    ->setRegionRus($temp->region_rus)
                    ->setLatitude($temp->latitude)
                    ->setLongitude($temp->longitude)
                    ->setZipCode($temp->zip_code)
                    ->setTimeZone($temp->time_zone)
                    ->setTimeModified(time());
            }
        }
        return $result;
    }
}
