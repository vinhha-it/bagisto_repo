<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit46e9dc1c2dcce438905600592097e28f
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

        spl_autoload_register(array('ComposerAutoloaderInit46e9dc1c2dcce438905600592097e28f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit46e9dc1c2dcce438905600592097e28f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit46e9dc1c2dcce438905600592097e28f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
