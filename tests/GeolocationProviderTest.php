<?php

namespace Lnorby\IpAddressLocator\Tests;

use Lnorby\IpAddressLocator\Geolocation;
use Lnorby\IpAddressLocator\GeolocationProvider;
use PHPUnit\Framework\TestCase;

abstract class GeolocationProviderTest extends TestCase
{
    abstract protected function geolocationProvider(): GeolocationProvider;

    public function testThatItReturnsAGeolocation(): void
    {
        $this->assertInstanceOf(
            Geolocation::class,
            $this->geolocationProvider()->getGeolocation('8.8.8.8')
        );
    }
}
