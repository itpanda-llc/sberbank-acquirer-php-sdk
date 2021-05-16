<?php

/**
 * Файл из репозитория Sberbank-Acquirer-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Features
 * @package Panda\Sberbank\AcquirerSdk
 * Особенности
 */
class Features
{
    /**
     * Платёж проводится без проверки подлинности владельца карты (без CVC и 3D-Secure)
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:registerpreauth
     */
    public const AUTO_PAYMENT = 'AUTO_PAYMENT';

    /**
     * Принудительное проведение платежа с использованием 3-D Secure
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:registerpreauth
     */
    public const FORCE_TDS = 'FORCE_TDS';

    /**
     * Принудительное проведение платежа через SSL (без использования 3-D Secure)
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:registerpreauth
     */
    public const FORCE_SSL = 'FORCE_SSL';

    /**
     * После проведения аутентификации с помощью 3-D Secure статус PaRes должен быть только Y, что гарантирует успешную аутентификацию пользователя
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:registerpreauth
     */
    public const FORCE_FULL_TDS = 'FORCE_FULL_TDS';
}
