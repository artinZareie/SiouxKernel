<?php

namespace SiouxKernel\Kernel;

class Kernel
{
    private static $singletons = [];

    /**
     * @return string (version of kernel)
     * @version 1.0.0
     */
    public static function version(): string
    {
        return '1.0.0';
    }

    /**
     * @param string $className
     * @return mixed
     */
    public static function getInstance(string $className): object
    {
        foreach (array_keys(self::$singletons) as $key) {
            if ($className == $key)
                return new self::$singletons[$key];
        }
        return new $className;
    }

    /**
     * @param string $name
     * @param string $instance
     */
    public static function singleton(string $name, string $instance): void
    {
        self::$singletons[$name] = $instance;
    }
}