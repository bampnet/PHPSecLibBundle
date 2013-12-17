<?php

namespace SkyDiablo\PHPSecLibBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SkyDiabloPHPSecLibBundle extends Bundle {

    public function boot() {
        /* @var $kernel \Symfony\Component\HttpKernel\Kernel */
        $kernel = $this->container->get('kernel');

        if ($kernel::MAJOR_VERSION == 2) {
            switch ($kernel::MINOR_VERSION) {
                case 0:
                    PHPSecLibAutoloaderSf20::registerAutoload($kernel->getRootDir() . '/../vendor/phpseclib/phpseclib/phpseclib');
                    break;
                case 1:
                case 2:
                    PHPSecLibAutoloaderSf21::registerAutoload();
                    break;
		case 3:
                    PHPSecLibAutoloaderSf21::registerAutoload();
                    break;
            }
        }
    }

}
