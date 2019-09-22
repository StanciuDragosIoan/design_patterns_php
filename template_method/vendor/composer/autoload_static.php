<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit45008ea63d66be9bff4b3fd0df3e86bf
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit45008ea63d66be9bff4b3fd0df3e86bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit45008ea63d66be9bff4b3fd0df3e86bf::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
