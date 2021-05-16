<?php

/**
 * Файл из репозитория Sberbank-Acquirer-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Reverse
 * @package Panda\Sberbank\AcquirerSdk
 * Запрос отмены оплаты заказа
 */
class Reverse extends Order
{
    /**
     * Наименование параметра "Номер заказа в платежной системе"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:reverse
     */
    protected const ORDER_ID = 'orderId';

    /**
     * Наименование параметра "Сумма"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:reverse
     */
    protected const AMOUNT = 'amount';

    /**
     * Наименование параметра "Дополнительные параметры"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:reverse
     */
    protected const JSON_PARAMS = 'jsonParams';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = Url::REVERSE;

    /**
     * Reverse constructor.
     * @param string $orderId Номер заказа в платежной системе
     * @param int|null $amount Сумма
     */
    public function __construct(string $orderId,
                                int $amount = null)
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

    /**
     * @param string $jsonParams Дополнительные параметры
     * @return $this
     */
    public function setJsonParams(string $jsonParams): self
    {
        $this->order[self::JSON_PARAMS] = $jsonParams;

        return $this;
    }
}
