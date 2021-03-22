<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Enrollment
 * @package Panda\Sberbank\AcquirerSdk
 * Запрос проверки вовлечённости карты в 3-D Secure
 */
class Enrollment extends Order
{
    /**
     * Наименование параметра "Маскированный номер карты"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:verifyenrollment
     */
    private const PAN = 'pan';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = Url::ENROLLMENT;

    /**
     * Enrollment constructor.
     * @param string $pan Маскированный номер карты
     */
    public function __construct(string $pan)
    {
        $this->order[self::PAN] = $pan;
    }
}
