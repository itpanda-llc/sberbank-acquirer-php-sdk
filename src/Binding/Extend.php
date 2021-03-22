<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

declare(strict_types=1);

namespace Panda\Sberbank\AcquirerSdk\Binding;

use Panda\Sberbank\AcquirerSdk;

/**
 * Class Extend
 * @package Panda\Sberbank\AcquirerSdk\Binding
 * Запрос изменения срока действия связки
 */
class Extend extends Unbind
{
    /**
     * Наименование параметра "Новая дата (год и месяц) окончания срока действия"
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:requests:extendbinding
     */
    private const NEW_EXPIRY = 'newExpiry';

    /**
     * @var string URL-адрес
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public $url = AcquirerSdk\Url::EXTEND_BINDING;

    /**
     * Extend constructor.
     * @param string $bindingId Идентификатор связки
     * @param string $newExpiry Новая дата (год и месяц) окончания срока действия
     */
    public function __construct(string $bindingId,
                                string $newExpiry)
    {
        parent::__construct($bindingId);

        $this->order[self::NEW_EXPIRY] = $newExpiry;
    }
}
