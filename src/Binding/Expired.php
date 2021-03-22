<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

namespace Panda\Sberbank\AcquirerSdk\Binding;

/**
 * Class Expired
 * @package Panda\Sberbank\AcquirerSdk\Binding
 * Отображение связок с истёкшим сроком действия карты
 */
class Expired
{
    /**
     * Отображать связки с истёкшим сроком действия карты
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindingsbycardorid
     */
    public const SHOW = true;

    /**
     * Не отображать связки с истёкшим сроком действия карты
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindingsbycardorid
     */
    public const DONT_SHOW = false;
}
