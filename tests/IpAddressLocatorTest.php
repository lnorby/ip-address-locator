<?php

namespace Lnorby\IpAddressLocator\Tests;

use Lnorby\IpAddressLocator\Geolocation;
use Lnorby\IpAddressLocator\IpAddressLocator;
use PHPUnit\Framework\TestCase;

class IpAddressLocatorTest extends TestCase
{
    public function testThatItWorksWithoutSettingAGeolocationProvider(): void
    {
        $ipAddressLocator = new IpAddressLocator();
        self::assertInstanceOf(Geolocation::class, $ipAddressLocator->locateIpAddress('8.8.8.8'));
    }
}
