<?php

namespace Lnorby\IpAddressLocator;

use Lnorby\IpAddressLocator\Exception\CouldNotLocateIpAddress;

interface GeolocationProvider
{
    /**
     * @throws CouldNotLocateIpAddress
     */
    public function getGeolocation(string $ipAddress): Geolocation;
}
