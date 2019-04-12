<?php

namespace SiouxKernel\Tools;

class Payload
{
    public static function requestDecoder(string $encoded): array
    {
        if ($encoded == "")
            return [];
        $decoded = [];
        foreach (explode('&', $encoded) as $hook) {
            $payload = explode('=', $hook);
            array_push($decoded, [$payload[0] => $payload[1]]);
        }
        return $decoded;
    }
}