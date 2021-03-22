<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Deposit
 * @package Panda\Sberbank\AcquirerSdk
 * Запрос завершения на полную сумму в деньгах
 */
class Deposit extends Order
{
    /**
     * Наименование параметра "Номер заказа в платежной системе"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:deposit
     */
    protected const ORDER_ID = 'orderId';

    /**
     * Наименование параметра "Сумма"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:deposit
     */
    private const AMOUNT = 'amount';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = Url::DEPOSIT;

    /**
     * Deposit constructor.
     * @param string $orderId Номер заказа в платежной системе
     * @param int $amount Сумма
     */
    public function __construct(string $orderId,
                                int $amount = 0)
    {
        $this->order[self::ORDER_ID] = $orderId;
        $this->order[self::AMOUNT] = $amount;
    }

    /**
     * @param int $amount Сумма
     * @return $this
     */
    public function setAmount(int $amount): self
    {
        $this->order[self::AMOUNT] = $amount;

        return $this;
    }
}
