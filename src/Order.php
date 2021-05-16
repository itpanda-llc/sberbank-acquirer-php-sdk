<?php

/**
 * Файл из репозитория Sberbank-Acquirer-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Order
 * @package Panda\Sberbank\AcquirerSdk
 * Заказ / Запрос
 */
class Order
{
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
    protected const LANGUAGE = 'language';

    /**
     * @var string|null URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url;

    /**
     * @var array Параметры заказа/запроса
     */
    public $order = [];

    /**
     * @return $this
     */
    public function asTest(): self
    {
        $this->url = str_replace(Url::PRODUCTION_SUBDOMAIN,
            Url::TEST_SUBDOMAIN,
            $this->url);

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
}
