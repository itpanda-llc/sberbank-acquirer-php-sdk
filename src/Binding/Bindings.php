<?php

/**
 * Файл из репозитория Sberbank-Acquirer-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-sdk
 */

namespace Panda\Sberbank\AcquirerSdk\Binding;

use Panda\Sberbank\AcquirerSdk;

/**
 * Class Bindings
 * @package Panda\Sberbank\AcquirerSdk\Binding
 * Запрос списка всех связок клиента / связок определённой банковской карты
 */
class Bindings extends AcquirerSdk\Order
{
    /**
     * Наименование параметра "Номер (идентификатор) клиента в системе магазина"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindings
     */
    private const CLIENT_ID = 'clientId';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = AcquirerSdk\Url::GET_BINDINGS;

    /**
     * Bindings constructor.
     * @param string $clientId Номер (идентификатор) клиента в системе магазина
     */
    public function __construct(string $clientId)
    {
        $this->order[self::CLIENT_ID] = $clientId;
    }
}
