<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Url
 * @package Panda\Sberbank\AcquirerSdk
 * URL-адреса
 */
class Url
{
    /**
     * Поддомен тестовой среды
     * @link https://securepayments.sberbank.ru/wiki/doku.php/checklist
     */
    public const TEST_SUBDOMAIN = '3dsec';

    /**
     * Поддомен продукционной среды
     * @link https://securepayments.sberbank.ru/wiki/doku.php/checklist
     */
    public const PRODUCTION_SUBDOMAIN = 'securepayments';

    /**
     * Регистрация заказа
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const REGISTER = 'https://securepayments.sberbank.ru/payment/rest/register.do';

    /**
     * Регистрация заказа с предавторизацией
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const REGISTER_PRE_AUTH = 'https://securepayments.sberbank.ru/payment/rest/registerPreAuth.do';

    /**
     * Запрос завершения оплаты заказа
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const DEPOSIT = 'https://securepayments.sberbank.ru/payment/rest/deposit.do';

    /**
     * Запрос отмены оплаты заказа
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const REVERSE = 'https://securepayments.sberbank.ru/payment/rest/reverse.do';

    /**
     * Запрос возврата средств оплаты заказа
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const REFUND = 'https://securepayments.sberbank.ru/payment/rest/refund.do';

    /**
     * Получение статуса заказа
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const ORDER_STATUS_EXTENDED = 'https://securepayments.sberbank.ru/payment/rest/getOrderStatusExtended.do';

    /**
     * Запрос проверки вовлечённости карты в 3DS
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const ENROLLMENT = 'https://securepayments.sberbank.ru/payment/rest/verifyEnrollment.do';

    /**
     * Запрос отмены неоплаченного заказа
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const DECLINE = 'https://securepayments.sberbank.ru/payment/rest/decline.do';

    /**
     * Запрос сведений о кассовом чеке
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const RECEIPT_STATUS = 'https://securepayments.sberbank.ru/payment/rest/getReceiptStatus.do';

    /**
     * Запрос деактивации связки
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const UNBIND_CARD = 'https://securepayments.sberbank.ru/payment/rest/unBindCard.do';

    /**
     * Запрос активации связки
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const BIND_CARD = 'https://securepayments.sberbank.ru/payment/rest/bindCard.do';

    /**
     * Запрос списка всех связок клиента
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const GET_BINDINGS = 'https://securepayments.sberbank.ru/payment/rest/getBindings.do';

    /**
     * Запрос списка связок определённой банковской карты
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const GET_BINDINGS_BY_CARD_OR_ID = 'https://securepayments.sberbank.ru/payment/rest/getBindingsByCardOrId.do';

    /**
     * Запрос изменения срока действия связки
     * @link https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start
     */
    public const EXTEND_BINDING = 'https://securepayments.sberbank.ru/payment/rest/extendBinding.do';
}
