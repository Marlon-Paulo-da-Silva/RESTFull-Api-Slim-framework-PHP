<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitaba7f3d2cd9ac59adbcfd2a6887ecd49
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitaba7f3d2cd9ac59adbcfd2a6887ecd49', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitaba7f3d2cd9ac59adbcfd2a6887ecd49', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitaba7f3d2cd9ac59adbcfd2a6887ecd49::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitaba7f3d2cd9ac59adbcfd2a6887ecd49::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequireaba7f3d2cd9ac59adbcfd2a6887ecd49($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequireaba7f3d2cd9ac59adbcfd2a6887ecd49($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
