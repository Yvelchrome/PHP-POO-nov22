<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita63d420903a222d093313c90a2fb8f63
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

        spl_autoload_register(array('ComposerAutoloaderInita63d420903a222d093313c90a2fb8f63', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita63d420903a222d093313c90a2fb8f63', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita63d420903a222d093313c90a2fb8f63::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
