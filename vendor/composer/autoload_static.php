<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0a7c398b35dbc8eb766ee372480995c
{
    public static $prefixLengthsPsr4 = array (
        'z' => 
        array (
            'zeal\\composer\\package\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'zeal\\composer\\package\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0a7c398b35dbc8eb766ee372480995c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0a7c398b35dbc8eb766ee372480995c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}