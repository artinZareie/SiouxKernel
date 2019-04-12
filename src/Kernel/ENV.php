<?php


namespace SiouxKernel\Kernel;


class ENV
{
    public static function set(string $name, string $value): void
    {
        putenv("${name}=${value}");
    }

    public static function get(string $name): string
    {
        return getenv($name);
    }
}