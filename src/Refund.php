<?php

/**
 * Файл из репозитория Sberbank-Acquirer-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Refund
 * @package Panda\Sberbank\AcquirerSdk
 * Запрос возврата на полную сумму в деньгах
 */
class Refund extends Reverse
{
    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = Url::REFUND;
}
