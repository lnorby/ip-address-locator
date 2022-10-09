<?php

namespace Lnorby\IpAddressLocator;

use Lnorby\IpAddressLocator\Exception\CouldNotLocateIpAddress;

final class IpAddressLocator
{
    /**
     * @var GeolocationProvider
     */
    private $geolocationProvider;

    public function __construct(?GeolocationProvider $geolocationProvider = null)
    {
        if (null === $geolocationProvider) {
            $this->geolocationProvider = new IpApiGeolocationProvider();
        } else {
            $this->geolocationProvider = $geolocationProvider;
        }
    }

    /**
     * @throws CouldNotLocateIpAddress
     */
    public function locateIpAddress(string $ipAddress): Geolocation
    {
        return $this->geolocationProvider->getGeolocation($ipAddress);
    }
}
