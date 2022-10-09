<?php

namespace Lnorby\IpAddressLocator\Tests;

use Lnorby\IpAddressLocator\GeolocationProvider;
use Lnorby\IpAddressLocator\IpApiGeolocationProvider;

class IpApiGeolocationProviderTest extends GeolocationProviderTest
{
    protected function geolocationProvider(): GeolocationProvider
    {
        return new IpApiGeolocationProvider();
    }
}
