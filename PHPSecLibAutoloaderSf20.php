<?php

namespace SkyDiablo\PHPSecLibBundle;

abstract class PHPSecLibAutoloaderSf20 {

    static $phpseclibPath;
    private static $classPrefix = array(
        'Crypt',
        'File',
        'Math',
        'Net'
    );

    public static function autoload($class) {
        $classParts = explode('_', $class, 2);
        if (is_array($classParts) && count($classParts) == 2) {
            $folder = $classParts[0];
            $className = $classParts[1];
            if (in_array($folder, static::$classPrefix)) {
                $path = static::$phpseclibPath . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $className . '.php';
                if (file_exists($path)) {
                    require $path;
                    return true;
                }
            }
        }
    }

    public static function registerAutoload($phpseclibPath) {
        static::$phpseclibPath = $phpseclibPath;
        spl_autoload_register(array('SkyDiablo\PHPSecLibBundle\PHPSecLibAutoloaderSf20', 'autoload'), true, false);
    }

}
