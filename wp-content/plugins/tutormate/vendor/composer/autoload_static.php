<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd6b331cf2cd5aa2c06dc022a984bd3dc
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TUTORMATE\\' => 10,
        ),
        'A' => 
        array (
            'AwesomeMotive\\WPContentImporter2\\' => 33,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TUTORMATE\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'AwesomeMotive\\WPContentImporter2\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib/awesomemotive/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd6b331cf2cd5aa2c06dc022a984bd3dc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd6b331cf2cd5aa2c06dc022a984bd3dc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd6b331cf2cd5aa2c06dc022a984bd3dc::$classMap;

        }, null, ClassLoader::class);
    }
}