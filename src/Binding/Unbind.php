<?php

/**
 * Файл из репозитория Sberbank-Acquirer-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-sdk
 */

namespace Panda\Sberbank\AcquirerSdk\Binding;

use Panda\Sberbank\AcquirerSdk;

/**
 * Class Unbind
 * @package Panda\Sberbank\AcquirerSdk\Binding
 * Запрос деактивации связки
 */
class Unbind extends AcquirerSdk\Order
{
    /**
     * Наименование параметра "Идентификатор связки"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:unbindcard
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:bindcard
     */
    protected const BINDING_ID = 'bindingId';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = AcquirerSdk\Url::UNBIND_CARD;

    /**
     * UnBind constructor.
     * @param string $bindingId Идентификатор связки
     */
    public function __construct(string $bindingId)
    {
        $this->order[self::BINDING_ID] = $bindingId;
    }
}
