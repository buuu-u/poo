<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0e328dc10e55246a4e3b3a6b5a5ead9d
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Styde\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Styde\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0e328dc10e55246a4e3b3a6b5a5ead9d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0e328dc10e55246a4e3b3a6b5a5ead9d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0e328dc10e55246a4e3b3a6b5a5ead9d::$classMap;

        }, null, ClassLoader::class);
    }
}
