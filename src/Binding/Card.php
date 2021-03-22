<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

declare(strict_types=1);

namespace Panda\Sberbank\AcquirerSdk\Binding;

use Panda\Sberbank\AcquirerSdk;

/**
 * Class Card
 * @package Panda\Sberbank\AcquirerSdk\Binding
 * Запрос деактивации/активации связки
 */
class Card extends Unbind
{
    /**
     * @var string|null URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url;

    /**
     * @param string $bindingId Идентификатор связки
     * @return static
     */
    public static function unbind(string $bindingId): self
    {
        $self = new self($bindingId);
        $self->url = AcquirerSdk\Url::UNBIND_CARD;

        return $self;
    }

    /**
     * @param string $bindingId Идентификатор связки
     * @return static
     */
    public static function bind(string $bindingId): self
    {
        $self = new self($bindingId);
        $self->url = AcquirerSdk\Url::BIND_CARD;

        return $self;
    }
}
