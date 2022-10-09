<?php

namespace Lnorby\IpAddressLocator;

final class HttpClient
{
    /**
     * @throws \RuntimeException
     */
    public static function get(string $url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if (false === $response) {
            throw new \RuntimeException(sprintf('Could not connect to URL "%s".', $url));
        }

        return $response;
    }
}
