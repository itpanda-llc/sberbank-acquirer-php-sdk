<?php

/**
 * Файл из репозитория Sberbank-Acquirer-PHP-SDK
 * @link https://github.com/itpanda-llc/sberbank-acquirer-php-sdk
 */

namespace Panda\Sberbank\AcquirerSdk;

/**
 * Class Currency
 * @package Panda\Sberbank\AcquirerSdk
 * Код валюты платежа
 */
class Currency
{
    /**
     * Евро
     * @link https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%B4%D1%8B_%D0%B8_%D0%BA%D0%BB%D0%B0%D1%81%D1%81%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%82%D0%BE%D1%80%D1%8B_%D0%B2%D0%B0%D0%BB%D1%8E%D1%82
     */
    public const EUR = 978;

    /**
     * Российский рубль
     * @link https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%B4%D1%8B_%D0%B8_%D0%BA%D0%BB%D0%B0%D1%81%D1%81%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%82%D0%BE%D1%80%D1%8B_%D0%B2%D0%B0%D0%BB%D1%8E%D1%82
     */
    public const RUB = 643;

    /**
     * Доллар США
     * @link https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%B4%D1%8B_%D0%B8_%D0%BA%D0%BB%D0%B0%D1%81%D1%81%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%82%D0%BE%D1%80%D1%8B_%D0%B2%D0%B0%D0%BB%D1%8E%D1%82
     */
    public const USD = 840;
}
