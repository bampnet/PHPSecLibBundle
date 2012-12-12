<?php

namespace SkyDiablo\PHPSecLibBundle;

abstract class PHPSecLibAutoloaderSf21 {

    public static function autoload($class) {
        if ($class == 'Crypt_Random') {
            require_once(__DIR__ . DIRECTORY_SEPARATOR . 'Crypt_Random.interface');
        }
    }

    public static function registerAutoload() {
        spl_autoload_register(array('SkyDiablo\PHPSecLibBundle\PHPSecLibAutoloaderSf21', 'autoload'), true, true);
    }

}
