<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

declare(strict_types=1);

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class StatusExtended
 * @package Panda\Sberbank\AcquirerSdk
 * Расширенный запрос состояния заказа
 */
class StatusExtended extends Order
{
    /**
     * Наименование параметра "Номер заказа в платежной системе"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getorderstatusextended
     */
    protected const ORDER_ID = 'orderId';

    /**
     * Наименование параметра "Номер (идентификатор) заказа в системе магазина"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getorderstatusextended
     */
    protected const ORDER_NUMBER = 'orderNumber';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = Url::ORDER_STATUS_EXTENDED;

    /**
     * StatusExtended constructor.
     * @param string|null $orderId Номер заказа в платежной системе
     */
    public function __construct(string $orderId = null)
    {
        $this->order[self::ORDER_ID] = $orderId;
    }

    /**
     * @param string $orderId Номер заказа в платежной системе
     * @return $this
     */
    public function setOrderId(string $orderId): self
    {
        $this->order[self::ORDER_ID] = $orderId;

        return $this;
    }

    /**
     * @param string $orderNumber Номер (идентификатор) заказа в системе магазина
     * @return $this
     */
    public function setOrderNumber(string $orderNumber): self
    {
        $this->order[self::ORDER_NUMBER] = $orderNumber;

        return $this;
    }

    /**
     * @param string $orderId Номер заказа в платежной системе
     * @return static
     */
    public static function byId(string $orderId): self
    {
        return (new static)->setOrderId($orderId);
    }

    /**
     * @param string $orderNumber Номер (идентификатор) заказа в системе магазина
     * @return static
     */
    public static function byNumber(string $orderNumber): self
    {
        return (new static)->setOrderNumber($orderNumber);
    }
}
