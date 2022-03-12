<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5817e0715a527b9559657511025e9265
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hawkiq\\Larapsn\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hawkiq\\Larapsn\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Sunra\\PhpSimple\\HtmlDomParser' => 
            array (
                0 => __DIR__ . '/..' . '/sunra/php-simple-html-dom-parser/Src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5817e0715a527b9559657511025e9265::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5817e0715a527b9559657511025e9265::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit5817e0715a527b9559657511025e9265::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit5817e0715a527b9559657511025e9265::$classMap;

        }, null, ClassLoader::class);
    }
}
