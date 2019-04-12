<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d02bc074b613fbab6b71c50f2e122c2
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SiouxKernel\\Tools\\' => 18,
            'SiouxKernel\\Kernel\\' => 19,
            'SiouxKernel\\HTTP\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SiouxKernel\\Tools\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Tools',
        ),
        'SiouxKernel\\Kernel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Kernel',
        ),
        'SiouxKernel\\HTTP\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/HTTP',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d02bc074b613fbab6b71c50f2e122c2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d02bc074b613fbab6b71c50f2e122c2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
