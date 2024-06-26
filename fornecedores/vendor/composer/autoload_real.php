<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit741bd1e81e8deecacfd2025cffba8288
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

        spl_autoload_register(array('ComposerAutoloaderInit741bd1e81e8deecacfd2025cffba8288', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit741bd1e81e8deecacfd2025cffba8288', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit741bd1e81e8deecacfd2025cffba8288::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
