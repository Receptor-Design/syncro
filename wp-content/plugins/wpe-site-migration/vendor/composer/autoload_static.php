<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitee7cb21b59fefe0cb86778d2c509a4fd
{
    public static $files = array (
        'dbi_mdb_320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        'dbi_mdb_bbf73f3db644d3dced353b837903e74c' => __DIR__ . '/..' . '/php-di/php-di/src/DI/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DeliciousBrains\\WPMDB\\Container\\Symfony\\Polyfill\\Ctype\\' => 55,
            'DeliciousBrains\\WPMDB\\Container\\Psr\\Container\\' => 46,
            'DeliciousBrains\\WPMDB\\Container\\PhpOption\\' => 42,
            'DeliciousBrains\\WPMDB\\Container\\PhpDocReader\\' => 45,
            'DeliciousBrains\\WPMDB\\Container\\Invoker\\' => 40,
            'DeliciousBrains\\WPMDB\\Container\\Interop\\Container\\' => 50,
            'DeliciousBrains\\WPMDB\\Container\\Dotenv\\' => 39,
            'DeliciousBrains\\WPMDB\\Container\\DI\\' => 35,
            'DeliciousBrains\\WPMDB\\Container\\Brumann\\Polyfill\\' => 49,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DeliciousBrains\\WPMDB\\Container\\Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'DeliciousBrains\\WPMDB\\Container\\Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'DeliciousBrains\\WPMDB\\Container\\PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'DeliciousBrains\\WPMDB\\Container\\PhpDocReader\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/phpdoc-reader/src/PhpDocReader',
        ),
        'DeliciousBrains\\WPMDB\\Container\\Invoker\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/invoker/src',
        ),
        'DeliciousBrains\\WPMDB\\Container\\Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/container-interop/container-interop/src/Interop/Container',
        ),
        'DeliciousBrains\\WPMDB\\Container\\Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'DeliciousBrains\\WPMDB\\Container\\DI\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/php-di/src/DI',
        ),
        'DeliciousBrains\\WPMDB\\Container\\Brumann\\Polyfill\\' => 
        array (
            0 => __DIR__ . '/..' . '/brumann/polyfill-unserialize/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DeliciousBrains\\WPMDB\\Container\\WP_Async_Request' => __DIR__ . '/..' . '/deliciousbrains/wp-background-processing/classes/wp-async-request.php',
        'DeliciousBrains\\WPMDB\\Container\\WP_Background_Process' => __DIR__ . '/..' . '/deliciousbrains/wp-background-processing/classes/wp-background-process.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitee7cb21b59fefe0cb86778d2c509a4fd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitee7cb21b59fefe0cb86778d2c509a4fd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitee7cb21b59fefe0cb86778d2c509a4fd::$classMap;

        }, null, ClassLoader::class);
    }
}
