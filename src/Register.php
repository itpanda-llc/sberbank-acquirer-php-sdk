<?php

/**
 * Файл из репозитория Sberbank-Acquirer-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Register
 * @package Panda\Sberbank\AcquirerSdk
 * Запрос регистрации заказа
 */
class Register extends Order
{
    /**
     * Наименование параметра "Номер (идентификатор) заказа в системе магазина"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const ORDER_NUMBER = 'orderNumber';

    /**
     * Наименование параметра "Сумма"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const AMOUNT = 'amount';

    /**
     * Наименование параметра "Код валюты платежа"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const CURRENCY = 'currency';

    /**
     * Наименование параметра "Адрес перенаправления пользователя в случае успешной оплаты"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const RETURN_URL = 'returnUrl';

    /**
     * Наименование параметра "Адрес перенаправления пользователя в случае неуспешной оплаты"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const FAIL_URL = 'failUrl';

    /**
     * Наименование параметра "Описание заказа"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const DESCRIPTION = 'description';

    /**
     * Наименование параметра "Страницы платёжного интерфейса"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const PAGE_VIEW = 'pageView';

    /**
     * Наименование параметра "Номер (идентификатор) клиента в системе магазина"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const CLIENT_ID = 'clientId';

    /**
     * Наименование параметра "Имя дочернего продавца"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const MERCHANT_LOGIN = 'merchantLogin';

    /**
     * Наименование параметра "Дополнительные параметры"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const JSON_PARAMS = 'jsonParams';

    /**
     * Наименование параметра "Продолжительность жизни заказа"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const SESSION_TIMEOUT_SECS = 'sessionTimeoutSecs';

    /**
     * Наименование параметра "Дата и время окончания жизни заказа"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const EXPIRATION_DATE = 'expirationDate';

    /**
     * Наименование параметра "Идентификатор связки"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const BINDING_ID = 'bindingId';

    /**
     * Наименование параметра "Особенности"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const FEATURES = 'features';

    /**
     * Наименование параметра "Адрес электронной почты покупателя"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const EMAIL = 'email';

    /**
     * Наименование параметра "Номер телефона клиента"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:register
     */
    protected const PHONE = 'phone';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = Url::REGISTER;

    /**
     * Register constructor.
     * @param string $orderNumber Номер (идентификатор) заказа в системе магазина
     * @param int $amount Сумма
     * @param string $returnUrl Адрес перенаправления пользователя в случае успешной оплаты
     * @param string|null $failUrl Адрес перенаправления пользователя в случае неуспешной оплаты
     */
    public function __construct(string $orderNumber,
                                int $amount,
                                string $returnUrl,
                                string $failUrl = null)
    {
        $this->order[self::ORDER_NUMBER] = $orderNumber;
        $this->order[self::AMOUNT] = $amount;
        $this->order[self::RETURN_URL] = $returnUrl;
        $this->order[self::FAIL_URL] = $failUrl;
    }

    /**
     * @param int $currency Код валюты платежа
     * @return $this
     */
    public function setCurrency(int $currency): self
    {
        $this->order[self::CURRENCY] = $currency;

        return $this;
    }

    /**
     * @param string $failUrl Адрес перенаправления пользователя в случае неуспешной оплаты
     * @return $this
     */
    public function setFailUrl(string $failUrl): self
    {
        $this->order[self::FAIL_URL] = $failUrl;

        return $this;
    }

    /**
     * @param string $description Описание заказа
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->order[self::DESCRIPTION] = $description;

        return $this;
    }

    /**
     * @param string $pageView Страницы платёжного интерфейса
     * @return $this
     */
    public function setPageView(string $pageView): self
    {
        $this->order[self::PAGE_VIEW] = $pageView;

        return $this;
    }

    /**
     * @param string $clientId Номер (идентификатор) клиента в системе магазина
     * @return $this
     */
    public function setClientId(string $clientId): self
    {
        $this->order[self::CLIENT_ID] = $clientId;

        return $this;
    }

    /**
     * @param string $merchantLogin Имя дочернего продавца
     * @return $this
     */
    public function setMerchantLogin(string $merchantLogin): self
    {
        $this->order[self::MERCHANT_LOGIN] = $merchantLogin;

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

    /**
     * @param int $sessionTimeoutSecs Продолжительность жизни заказа
     * @return $this
     */
    public function setSessionTimeoutSecs(int $sessionTimeoutSecs): self
    {
        $this->order[self::SESSION_TIMEOUT_SECS] = $sessionTimeoutSecs;

        return $this;
    }

    /**
     * @param string $expirationDate Дата и время окончания жизни заказа
     * @return $this
     */
    public function setExpirationDate(string $expirationDate): self
    {
        $this->order[self::EXPIRATION_DATE] = $expirationDate;

        return $this;
    }

    /**
     * @param string $bindingId Идентификатор связки
     * @return $this
     */
    public function setBindingId(string $bindingId): self
    {
        $this->order[self::BINDING_ID] = $bindingId;

        return $this;
    }

    /**
     * @param string $features Особенности
     * @return $this
     */
    public function setFeatures(string $features): self
    {
        $this->order[self::FEATURES] = $features;

        return $this;
    }

    /**
     * @param string $email Адрес электронной почты покупателя
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->order[self::EMAIL] = $email;

        return $this;
    }

    /**
     * @param string $phone Номер телефона клиента
     * @return $this
     */
    public function setPhone(string $phone): self
    {
        if (preg_match("/^((\+7|7|8)?([0-9]){10})$/", $phone) === 1)
            $this->order[self::PHONE] = $phone;

        return $this;
    }
}
