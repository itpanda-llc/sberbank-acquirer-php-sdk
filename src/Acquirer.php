<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

declare(strict_types=1);

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Acquirer
 * @package Panda\Sberbank\AcquirerSdk
 * Формирование заказа / Выполнение запроса
 */
class Acquirer extends Request
{
    /**
     * Наименование параметра "Логин"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:registerpreauth
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:deposit
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:reverse
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:refund
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getorderstatusextended
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:verifyenrollment
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:decline
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getreceiptstatus
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:unbindcard
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:bindcard
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindings
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindingsbycardorid
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:extendbinding
     */
    private const USER_NAME = 'userName';

    /**
     * Наименование параметра "Пароль"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:registerpreauth
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:deposit
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:reverse
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:refund
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getorderstatusextended
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:verifyenrollment
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:decline
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getreceiptstatus
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:unbindcard
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:bindcard
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindings
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindingsbycardorid
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:extendbinding
     */
    private const PASSWORD = 'password';

    /**
     * Наименование параметра "Открытый ключ"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:registerpreauth
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:deposit
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:reverse
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:refund
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getorderstatusextended
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:verifyenrollment
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:decline
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getreceiptstatus
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:unbindcard
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:bindcard
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindings
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindingsbycardorid
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:extendbinding
     */
    private const TOKEN = 'token';

    /**
     * Наименование параметра "Язык"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:registerpreauth
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:deposit
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:reverse
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:refund
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getorderstatusextended
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:verifyenrollment
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:decline
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getreceiptstatus
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:unbindcard
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:bindcard
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindings
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindingsbycardorid
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:extendbinding
     */
    private const LANGUAGE = 'language';

    /**
     * @var string Поддомен тестовой/продукционной среды
     * @link https://securepayments.sberbank.ru/wiki/doku.php/checklist
     */
    private $subdomain = Url::PRODUCTION_SUBDOMAIN;

    /**
     * @var array Параметры заказа/запроса
     */
    private $order = [];

    /**
     * Acquirer constructor.
     * @param string $reason Логин / Открытый ключ
     * @param string|null $password Пароль
     */
    public function __construct(string $reason,
                                string $password = null)
    {
        $this->order[(is_null($password))
            ? self::TOKEN
            : self::USER_NAME] = $reason;

        $this->order[self::PASSWORD] = $password;
    }

    /**
     * @return $this
     */
    public function asTest(): self
    {
        $this->subdomain = Url::TEST_SUBDOMAIN;

        return $this;
    }

    /**
     * @param string $language Язык
     * @return $this
     */
    public function setLanguage(string $language): self
    {
        $this->order[self::LANGUAGE] = $language;

        return $this;
    }

    /**
     * @param string $orderNumber Номер (идентификатор) заказа в системе магазина
     * @param int $amount Сумма
     * @param string $returnUrl Адрес перенаправления пользователя в случае успешной оплаты
     * @param string|null $failUrl Адрес перенаправления пользователя в случае неуспешной оплаты
     * @return string Результат web-запроса
     */
    public function register(string $orderNumber,
                             int $amount,
                             string $returnUrl,
                             string $failUrl = null): string
    {
        return $this->request(new Register($orderNumber,
            $amount,
            $returnUrl,
            $failUrl));
    }

    /**
     * @param string $orderNumber Номер (идентификатор) заказа в системе магазина
     * @param int $amount Сумма
     * @param string $returnUrl Адрес перенаправления пользователя в случае успешной оплаты
     * @param string|null $failUrl Адрес перенаправления пользователя в случае неуспешной оплаты
     * @return string Результат web-запроса
     */
    public function registerPreAuth(string $orderNumber,
                                    int $amount,
                                    string $returnUrl,
                                    string $failUrl = null): string
    {
        return $this->request(new RegisterPreAuth($orderNumber,
            $amount,
            $returnUrl,
            $failUrl));
    }

    /**
     * @param string $orderId Номер заказа в платежной системе
     * @param int $amount Сумма
     * @return string Результат web-запроса
     */
    public function deposit(string $orderId, int $amount = 0): string
    {
        return $this->request(new Deposit($orderId, $amount));
    }

    /**
     * @param string $orderId Номер заказа в платежной системе
     * @param int|null $amount Сумма
     * @return string Результат web-запроса
     */
    public function reverse(string $orderId,
                            int $amount = null): string
    {
        return $this->request(new Reverse($orderId, $amount));
    }

    /**
     * @param string $orderId Номер заказа в платежной системе
     * @param int $amount Сумма
     * @return string Результат web-запроса
     */
    public function refund(string $orderId,
                           int $amount): string
    {
        return $this->request(new Refund($orderId, $amount));
    }

    /**
     * @param string $orderId Номер заказа в платежной системе
     * @return string Результат web-запроса
     */
    public function getStatusExtendedById(string $orderId): string
    {
        return $this->request(new StatusExtended($orderId));
    }

    /**
     * @param string $orderNumber Номер (идентификатор) заказа в системе магазина
     * @return string Результат web-запроса
     */
    public function getStatusExtendedByNumber(string $orderNumber): string
    {
        return $this->request((new StatusExtended)
            ->setOrderNumber($orderNumber));
    }

    /**
     * @param string $pan Маскированный номер карты
     * @return string Результат web-запроса
     */
    public function verifyEnrollment(string $pan): string
    {
        return $this->request(new Enrollment($pan));
    }

    /**
     * @param string $merchantLogin Имя мерчанта
     * @param string $orderId Номер заказа в платежной системе
     * @return string Результат web-запроса
     */
    public function declineById(string $merchantLogin,
                                string $orderId): string
    {
        return $this->request(new Decline($merchantLogin,
            $orderId));
    }

    /**
     * @param string $merchantLogin Имя мерчанта
     * @param string $orderNumber Номер заказа в системе магазина
     * @return string Результат web-запроса
     */
    public function declineByNumber(string $merchantLogin,
                                    string $orderNumber): string
    {
        return $this->request((new Decline($merchantLogin))
            ->setOrderNumber($orderNumber));
    }

    /**
     * @param string $uuid Идентификатор чека в фискализаторе
     * @return string Результат web-запроса
     */
    public function getReceiptStatusByUuid(string $uuid): string
    {
        return $this->request(new ReceiptStatus($uuid));
    }

    /**
     * @param string $orderId Номер заказа в платежной системе
     * @return string Результат web-запроса
     */
    public function getReceiptStatusById(string $orderId): string
    {
        return $this->request((new ReceiptStatus)
            ->setOrderId($orderId));
    }

    /**
     * @param string $orderNumber Номер (идентификатор) заказа в системе магазина
     * @return string Результат web-запроса
     */
    public function getReceiptStatusByNumber(string $orderNumber): string
    {
        return $this->request((new ReceiptStatus)
            ->setOrderNumber($orderNumber));
    }

    /**
     * @param string $bindingId Идентификатор связки
     * @return string Результат web-запроса
     */
    public function unBind(string $bindingId): string
    {
        return $this->request(new Binding\UnBind($bindingId));
    }

    /**
     * @param string $bindingId Идентификатор связки
     * @return string Результат web-запроса
     */
    public function bind(string $bindingId): string
    {
        return $this->request(new Binding\Bind($bindingId));
    }

    /**
     * @param string $clientId Номер (идентификатор) клиента в системе магазина
     * @return string Результат web-запроса
     */
    public function getBindingsByClient(string $clientId): string
    {
        return $this->request(new Binding\Bindings($clientId));
    }

    /**
     * @param string $pan Маскированный номер карты
     * @param bool $showExpired Отображение связок с истёкшим сроком действия карты
     * @return string Результат web-запроса
     */
    public function getBindingsByCard(string $pan,
                                      bool $showExpired = null): string
    {
        return $this->request(new Binding\BindingsCard($pan,
            $showExpired));
    }

    /**
     * @param string $bindingId Идентификатор связки
     * @param bool $showExpired Отображение связок с истёкшим сроком действия карты
     * @return string Результат web-запроса
     */
    public function getBindingsById(string $bindingId,
                                    bool $showExpired = null): string
    {
        ($bindingsCard = new Binding\BindingsCard)
            ->setBindingId($bindingId);

        if (!is_null($showExpired))
            $bindingsCard->setShowExpired($showExpired);

        return $this->request($bindingsCard);
    }

    /**
     * @param string $bindingId Идентификатор связки
     * @param string $newExpiry Новая дата (год и месяц) окончания срока действия
     * @return string Результат web-запроса
     */
    public function extendBinding(string $bindingId,
                                  string $newExpiry): string
    {
        return $this->request(new Binding\Extend($bindingId,
            $newExpiry));
    }

    /**
     * @param Order $order Параметры заказа/запроса
     * @return string Результат web-запроса
     */
    public function request(Order $order): string
    {
        return $this->send(str_replace(Url::PRODUCTION_SUBDOMAIN,
            $this->subdomain,
            $order->url),
            http_build_query($order->order + $this->order));
    }
}
