<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

declare(strict_types=1);

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Decline
 * @package Panda\Sberbank\AcquirerSdk
 * Запрос отмены неоплаченного заказа
 */
class Decline extends Order
{
    /**
     * Наименование параметра "Номер заказа в платежной системе"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:decline
     */
    protected const ORDER_ID = 'orderId';

    /**
     * Наименование параметра "Имя мерчанта"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:decline
     */
    private const MERCHANT_LOGIN = 'merchantLogin';

    /**
     * Наименование параметра "Номер (идентификатор) заказа в системе магазина"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:decline
     */
    private const ORDER_NUMBER = 'orderNumber';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = Url::DECLINE;

    /**
     * Decline constructor.
     * @param string $merchantLogin Имя мерчанта
     * @param string|null $orderId Номер заказа в платежной системе
     */
    public function __construct(string $merchantLogin,
                                string $orderId = null)
    {
        $this->order[self::MERCHANT_LOGIN] = $merchantLogin;
        $this->order[self::ORDER_ID] = $orderId;
    }

    /**
     * @param string $orderId Номер заказа в платежной системе
     * @return $this
     */
    public function setOrderId(string $orderId): self
    {
        $this->order[self::ORDER_NUMBER] = null;
        $this->order[self::ORDER_ID] = $orderId;

        return $this;
    }

    /**
     * @param string $orderNumber Номер (идентификатор) заказа в системе магазина
     * @return $this
     */
    public function setOrderNumber(string $orderNumber): self
    {
        $this->order[self::ORDER_ID] = null;
        $this->order[self::ORDER_NUMBER] = $orderNumber;

        return $this;
    }

    /**
     * @param string $merchantLogin Имя мерчанта
     * @param string $orderId Номер заказа в платежной системе
     * @return static
     */
    public static function byId(string $merchantLogin,
                                string $orderId): self
    {
        return new self($merchantLogin, $orderId);
    }

    /**
     * @param string $merchantLogin Имя мерчанта
     * @param string $orderNumber Номер (идентификатор) заказа в системе магазина
     * @return static
     */
    public static function byNumber(string $merchantLogin,
                                    string $orderNumber): self
    {
        return (new self($merchantLogin))
            ->setOrderNumber($orderNumber);
    }
}
