<?php

/**
 * Файл из репозитория Sberbank-Acquirer-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class RegisterPreAuth
 * @package Panda\Sberbank\AcquirerSdk
 * Запрос регистрации заказа с предавторизацией
 */
class RegisterPreAuth extends Register
{
    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = Url::REGISTER_PRE_AUTH;
}
