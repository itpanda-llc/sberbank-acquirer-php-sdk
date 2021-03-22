<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

namespace Panda\Sberbank\AcquirerSdk\Binding;

use Panda\Sberbank\AcquirerSdk;

/**
 * Class Bind
 * @package Panda\Sberbank\AcquirerSdk\Binding
 * Запрос активации связки
 */
class Bind extends Unbind
{
    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = AcquirerSdk\Url::BIND_CARD;
}
