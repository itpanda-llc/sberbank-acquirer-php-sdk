<?php

/**
 * Файл из репозитория Sberbank-Acquirer-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-sdk
 */

declare(strict_types=1);

namespace Panda\Sberbank\AcquirerSdk\Binding;

use Panda\Sberbank\AcquirerSdk;

/**
 * Class BindingsCard
 * @package Panda\Sberbank\AcquirerSdk\Binding
 * Запрос списка связок определённой банковской карты
 */
class BindingsCard extends AcquirerSdk\Order
{
    /**
     * Наименование параметра "Маскированный номер карты"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindingsbycardorid
     */
    private const PAN = 'pan';

    /**
     * Наименование параметра "Идентификатор связки"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindingsbycardorid
     */
    private const BINDING_ID = 'bindingId';

    /**
     * Наименование параметра "Отображение связок с истёкшим сроком действия карты"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:getbindingsbycardorid
     */
    private const SHOW_EXPIRED = 'showExpired';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = AcquirerSdk\Url::GET_BINDINGS_BY_CARD_OR_ID;

    /**
     * BindingsCard constructor.
     * @param string|null $pan Маскированный номер карты
     * @param bool|null $showExpired Отображение связок с истёкшим сроком действия карты
     */
    public function __construct(string $pan = null,
                                bool $showExpired = null)
    {
        $this->order[self::PAN] = $pan;
        $this->order[self::SHOW_EXPIRED] = $showExpired;
    }

    /**
     * @param string $pan Маскированный номер карты
     * @return $this
     */
    public function setPan(string $pan): self
    {
        $this->order[self::BINDING_ID] = null;
        $this->order[self::PAN] = $pan;

        return $this;
    }

    /**
     * @param string $bindingId Идентификатор связки
     * @return $this
     */
    public function setBindingId(string $bindingId): self
    {
        $this->order[self::PAN] = null;
        $this->order[self::BINDING_ID] = $bindingId;

        return $this;
    }

    /**
     * @param bool $showExpired Отображение связок с истёкшим сроком действия карты
     * @return $this
     */
    public function setShowExpired(bool $showExpired): self
    {
        $this->order[self::SHOW_EXPIRED] = $showExpired;

        return $this;
    }

    /**
     * @param string $pan Маскированный номер карты
     * @param bool|null $showExpired Отображение связок с истёкшим сроком действия карты
     * @return static
     */
    public static function byCard(string $pan,
                                  bool $showExpired = null): self
    {
        return new self($pan, $showExpired);
    }

    /**
     * @param string $bindingId Идентификатор связки
     * @param bool|null $showExpired Отображение связок с истёкшим сроком действия карты
     * @return static
     */
    public static function byId(string $bindingId,
                                bool $showExpired = null): self
    {
        $self = new self;

        $self->order[self::BINDING_ID] = $bindingId;
        $self->order[self::SHOW_EXPIRED] = $showExpired;

        return $self;
    }
}
