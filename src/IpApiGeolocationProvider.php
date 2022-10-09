<?php

namespace Lnorby\IpAddressLocator;

use Lnorby\IpAddressLocator\Exception\CouldNotConnectToGeolocationProvider;
use Lnorby\IpAddressLocator\Exception\CouldNotLocateIpAddress;

final class IpApiGeolocationProvider implements GeolocationProvider
{
    public function getGeolocation(string $ipAddress): Geolocation
    {
        try {
            $response = HttpClient::get('http://ip-api.com/json/' . $ipAddress);
        } catch (\RuntimeException $e) {
            throw new CouldNotConnectToGeolocationProvider();
        }

        $response = json_decode($response);

        if (null === $response) {
            throw new CouldNotLocateIpAddress();
        }

        $geolocation = new Geolocation();
        $geolocation->countryCode = $response->countryCode;
        $geolocation->countryName = $response->country;
        $geolocation->regionCode = $response->region;
        $geolocation->regionName = $response->regionName;
        $geolocation->city = $response->city;
        $geolocation->zipCode = $response->zip;
        $geolocation->timeZone = $response->timezone;
        $geolocation->latitude = $response->lat;
        $geolocation->longitude = $response->lon;

        return $geolocation;
    }
}
