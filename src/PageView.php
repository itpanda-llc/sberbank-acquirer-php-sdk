<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class PageView
 * @package Panda\Sberbank\AcquirerSdk
 * Страницы платёжного интерфейса
 */
class PageView
{
    /**
     * Страницы, вёрстка которых предназначена для отображения на экранах ПК
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:registerpreauth
     */
    public const DESKTOP = 'DESKTOP';

    /**
     * Страницы, вёрстка которых предназначена для отображения на экранах мобильных устройств
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:registerpreauth
     */
    public const MOBILE = 'MOBILE';
}
