<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5ae9f4fd87e87b39d6680ec8574d9656
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Anaise\\KpopPhp\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Anaise\\KpopPhp\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit5ae9f4fd87e87b39d6680ec8574d9656::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5ae9f4fd87e87b39d6680ec8574d9656::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5ae9f4fd87e87b39d6680ec8574d9656::$classMap;

        }, null, ClassLoader::class);
    }
}
