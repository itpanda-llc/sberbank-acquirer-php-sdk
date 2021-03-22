<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

declare(strict_types=1);

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class ReceiptStatus
 * @package Panda\Sberbank\AcquirerSdk
 * Запрос сведений о кассовом чеке
 */
class ReceiptStatus extends StatusExtended
{
    /**
     * Наименование параметра "Идентификатор чека в фискализаторе"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getreceiptstatus
     */
    private const UUID = 'uuid';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = Url::RECEIPT_STATUS;

    /**
     * ReceiptStatus constructor.
     * @param string|null $uuid Идентификатор чека в фискализаторе
     */
    public function __construct(string $uuid = null)
    {
        parent::__construct();

        $this->order[self::UUID] = $uuid;
    }

    /**
     * @param string $uuid Идентификатор чека в фискализаторе
     * @return $this
     */
    public function setUuid(string $uuid): self
    {
        $this->order[self::UUID] = $uuid;

        return $this;
    }

    /**
     * @param string $uuid Идентификатор чека в фискализаторе
     * @return static
     */
    public static function byUuid(string $uuid): self
    {
        return new self($uuid);
    }
}
