# Sberbank-Acquirer-PHP-SDK

Библиотека для интеграции с процессинговым центром [ПАО "Сбербанк"](https://sberbank.ru)

[![Packagist Downloads](https://img.shields.io/packagist/dt/itpanda-llc/sberbank-acquirer-sdk)](https://packagist.org/packages/itpanda-llc/sberbank-acquirer-sdk/stats)
![Packagist License](https://img.shields.io/packagist/l/itpanda-llc/sberbank-acquirer-sdk)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/itpanda-llc/sberbank-acquirer-sdk)

## Ссылки

* [Разработка](https://github.com/itpanda-llc)
* [О проекте (Сбербанк)](https://sberbank.ru)
* [Документация (API Сбербанк)](https://securepayments.sberbank.ru/wiki/doku.php/integration:api:rest:start)

## Возможности

* Регистрация заказа
* Регистрация заказа с предавторизацией
* Запрос завершения оплаты заказа
* Запрос отмены оплаты заказа
* Запрос возврата средств оплаты заказа
* Получение статуса заказа
* Запрос проверки вовлечённости карты в 3DS
* Запрос отмены неоплаченного заказа
* Запрос сведений о кассовом чеке
* Запрос деактивации связки
* Запрос активации связки
* Запрос списка всех связок клиента
* Запрос списка связок определённой банковской карты
* Запрос изменения срока действия связки

## Требования

* PHP >= 7.2
* cURL

## Установка

```shell script
composer require itpanda-llc/sberbank-acquirer-sdk
```

## Подключение

```php
require_once 'vendor/autoload.php';
```

## Использование

### Создание сервиса / Аутентификация

* С использованием логина и пароля

```php
use Panda\Sberbank\AcquirerSdk;

/*
 * Логин
 * Пароль
 */
$acquirer = new AcquirerSdk\Acquirer('userName', 'password');
```

* С использованием открытого ключа

```php
use Panda\Sberbank\AcquirerSdk;

// Открытый ключ
$acquirer = new AcquirerSdk\Acquirer('token');
```

### Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$acquirer->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU);
```

### Регистрация заказа

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

/*
 * Номер заказа в системе магазина
 * Сумма
 * Адрес перенаправления пользователя в случае успешной оплаты
 * Адрес перенаправления пользователя в случае неуспешной оплаты
 */
$register = new AcquirerSdk\Register('20016551', 55000, 'https://sberbank.ru', 'https://sberbank.ru');
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$register->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU)

    // Код валюты платежа
    ->setCurrency(AcquirerSdk\Currency::RUB)

    // Адрес перенаправления пользователя в случае неуспешной оплаты
    ->setFailUrl('https://sberbank.ru')

    // Описание заказа
    ->setDescription('Оплата заказа #20016551')

    // Страницы платёжного интерфейса
    ->setPageView(AcquirerSdk\PageView::DESKTOP)

    // Номер клиента в системе магазина
    ->setClientId('clientId')

    // Имя дочернего продавца
    ->setMerchantLogin('merchantLogin')

    // Дополнительные параметры
    ->setJsonParams('{"back2app": true}')

    // Продолжительность жизни заказа
    ->setSessionTimeoutSecs(600)

    // Дата и время окончания жизни заказа
    ->setExpirationDate('ГГГГ-ММ-ДДTЧЧ:ММ:СС')

    // Идентификатор связки
    ->setBindingId('bindingId')

    // Особенности
    ->setFeatures(AcquirerSdk\Features::AUTO_PAYMENT)

    // Адрес электронной почты покупателя
    ->setEmail('support_ecomm@sberbank.ru')

    // Номер телефона клиента
    ->setPhone('79995550011');
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($register));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    /*
     * Номер заказа в системе магазина
     * Сумма
     * Адрес перенаправления пользователя в случае успешной оплаты
     * Адрес перенаправления пользователя в случае неуспешной оплаты
     */
    print_r($acquirer->register('20016551', 55000, 'https://sberbank.ru', 'https://sberbank.ru'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Регистрация заказа с предавторизацией

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

/*
 * Номер заказа в системе магазина
 * Сумма
 * Адрес перенаправления пользователя в случае успешной оплаты
 * Адрес перенаправления пользователя в случае неуспешной оплаты
 */
$registerPreAuth = new AcquirerSdk\RegisterPreAuth('20016551', 55000, 'https://sberbank.ru', 'https://sberbank.ru');
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$registerPreAuth->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::EN)

    // Код валюты платежа
    ->setCurrency(AcquirerSdk\Currency::USD)

    // Адрес перенаправления пользователя в случае неуспешной оплаты
    ->setFailUrl('https://sberbank.ru')

    // Описание заказа
    ->setDescription('Payment for order #20016551')

    // Страницы платёжного интерфейса
    ->setPageView(AcquirerSdk\PageView::MOBILE)

    // Номер клиента в системе магазина
    ->setClientId('clientId')

    // Имя дочернего продавца
    ->setMerchantLogin('merchantLogin')

    // Дополнительные параметры
    ->setJsonParams('{"back2app": true}')

    // Продолжительность жизни заказа
    ->setSessionTimeoutSecs(600)

    // Дата и время окончания жизни заказа
    ->setExpirationDate('ГГГГ-ММ-ДДTЧЧ:ММ:СС')

    // Идентификатор связки
    ->setBindingId('bindingId')

    // Особенности
    ->setFeatures(AcquirerSdk\Features::FORCE_FULL_TDS)

    // Адрес электронной почты покупателя
    ->setEmail('support_ecomm@sberbank.ru')

    // Номер телефона клиента
    ->setPhone('79995550011');
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($registerPreAuth));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    /*
     * Номер заказа в системе магазина
     * Сумма
     * Адрес перенаправления пользователя в случае успешной оплаты
     * Адрес перенаправления пользователя в случае неуспешной оплаты
     */
    print_r($acquirer->registerPreAuth('20016551', 55000, 'https://sberbank.ru', 'https://sberbank.ru'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос завершения оплаты заказа

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

/*
 * Номер заказа в платежной системе
 * Сумма
 */
$deposit = new AcquirerSdk\Deposit('961e34e7-e897-7d22-8b62-19650008f9da', 55000);
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$deposit->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU)

    // Сумма
    ->setAmount(55000);
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($deposit));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    /*
     * Номер заказа в платежной системе
     * Сумма
     */
    print_r($acquirer->deposit('961e34e7-e897-7d22-8b62-19650008f9da', 55000));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос отмены оплаты заказа

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

/*
 * Номер заказа в платежной системе
 * Сумма
 */
$reverse = new AcquirerSdk\Reverse('961e34e7-e897-7d22-8b62-19650008f9da', 55000);
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$reverse->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU)

    // Сумма
    ->setAmount(55000)

    // Дополнительные параметры
    ->setJsonParams('{«Имя1»: «Значение1», «Имя2»: «Значение2»}');
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($reverse));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    /*
     * Номер заказа в платежной системе
     * Сумма
     */
    print_r($acquirer->reverse('961e34e7-e897-7d22-8b62-19650008f9da', 55000));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос возврата средств оплаты заказа

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

/*
 * Номер заказа в платежной системе
 * Сумма
 */
$refund = new AcquirerSdk\Refund('961e34e7-e897-7d22-8b62-19650008f9da', 55000);
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$refund->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU)

    // Сумма
    ->setAmount(55000)

    // Дополнительные параметры
    ->setJsonParams('{«Имя1»: «Значение1», «Имя2»: «Значение2»}');
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($refund));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    /*
     * Номер заказа в платежной системе
     * Сумма
     */
    print_r($acquirer->refund('961e34e7-e897-7d22-8b62-19650008f9da', 55000));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Получение статуса заказа

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

// Номер заказа в платежной системе
$statusExtended = new AcquirerSdk\StatusExtended('961e34e7-e897-7d22-8b62-19650008f9da');

// или

// Номер заказа в платежной системе
$statusExtended = AcquirerSdk\StatusExtended::byId('961e34e7-e897-7d22-8b62-19650008f9da');

// или

// Номер заказа в системе магазина
$statusExtended = AcquirerSdk\StatusExtended::byNumber('20016551');
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$statusExtended->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU)

    // Номер заказа в платежной системе
    ->setOrderId('961e34e7-e897-7d22-8b62-19650008f9da')

    // Номер заказа в системе магазина
    ->setOrderNumber('20016551');
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($statusExtended));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    // Номер заказа в платежной системе
    print_r($acquirer->getStatusExtendedById('961e34e7-e897-7d22-8b62-19650008f9da'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}

// или

try {
    // Номер заказа в системе магазина
    print_r($acquirer->getStatusExtendedByNumber('20016551'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос проверки вовлечённости карты в 3DS

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

// Маскированный номер карты
$enrollment = new AcquirerSdk\Enrollment('411111**1111');
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$enrollment->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU);
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($enrollment));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    // Маскированный номер карты
    print_r($acquirer->verifyEnrollment('411111**1111'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос отмены неоплаченного заказа

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

/*
 * Имя мерчанта
 * Номер заказа в платежной системе
 */
$decline = new AcquirerSdk\Decline('merchantLogin', '961e34e7-e897-7d22-8b62-19650008f9da');

// или

/*
 * Имя мерчанта
 * Номер заказа в платежной системе
 */
$decline = AcquirerSdk\Decline::byId('merchantLogin', '961e34e7-e897-7d22-8b62-19650008f9da');

// или

/*
 * Имя мерчанта
 * Номер заказа в системе магазина
 */
$decline = AcquirerSdk\Decline::byNumber('merchantLogin', '20016551');
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$decline->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU)

    // Номер заказа в платежной системе
    ->setOrderId('961e34e7-e897-7d22-8b62-19650008f9da')

    // Номер заказа в системе магазина
    ->setOrderNumber('20016551');
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($decline));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    /*
     * Имя мерчанта
     * Номер заказа в платежной системе
     */
    print_r($acquirer->declineById('merchantLogin', '961e34e7-e897-7d22-8b62-19650008f9da'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}

// или

try {
    /*
     * Имя мерчанта
     * Номер заказа в системе магазина
     */
    print_r($acquirer->declineByNumber('merchantLogin', '20016551'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос сведений о кассовом чеке

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

// Идентификатор чека в фискализаторе
$receiptStatus = new AcquirerSdk\ReceiptStatus('uuid');

// или

// Идентификатор чека в фискализаторе
$receiptStatus = AcquirerSdk\ReceiptStatus::byUuid('uuid');

// или

// Номер заказа в платежной системе
$receiptStatus = AcquirerSdk\ReceiptStatus::byId('961e34e7-e897-7d22-8b62-19650008f9da');

// или

// Номер заказа в системе магазина
$receiptStatus = AcquirerSdk\ReceiptStatus::byNumber('20016551');
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$receiptStatus->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU)

    // Идентификатор чека в фискализаторе
    ->setUuid('uuid')

    // Номер заказа в платежной системе
    ->setOrderId('961e34e7-e897-7d22-8b62-19650008f9da')

    // Номер заказа в системе магазина
    ->setOrderNumber('20016551');
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($receiptStatus));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    // Идентификатор чека в фискализаторе
    print_r($acquirer->getReceiptStatusByUuid('uuid'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}

// или

try {
    // Номер заказа в платежной системе
    print_r($acquirer->getReceiptStatusById('961e34e7-e897-7d22-8b62-19650008f9da'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}

// или

try {
    // Номер заказа в системе магазина
    print_r($acquirer->getReceiptStatusByNumber('20016551'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос деактивации связки

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

// Идентификатор связки
$unbind = new AcquirerSdk\Binding\Unbind('bindingId');

// или

// Идентификатор связки
$unbind = AcquirerSdk\Binding\Card::unbind('bindingId');
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$unbind->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU);
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($unbind));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    // Идентификатор связки
    print_r($acquirer->unbind('bindingId'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос активации связки

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

// Идентификатор связки
$bind = new AcquirerSdk\Binding\Bind('bindingId');

// или

// Идентификатор связки
$bind = AcquirerSdk\Binding\Card::bind('bindingId');
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$bind->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU);
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($bind));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    // Идентификатор связки
    print_r($acquirer->bind('bindingId'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос списка всех связок клиента

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

// Идентификатор клиента
$bindings = new AcquirerSdk\Binding\Bindings('clientId');
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$bindings->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU);
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($bindings));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    // Идентификатор клиента
    print_r($acquirer->getBindingsByClient('clientId'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос списка связок определённой банковской карты

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

/*
 * Маскированный номер карты
 * Отображение связок с истёкшим сроком действия карты
 */
$bindingsCard = new AcquirerSdk\Binding\BindingsCard('411111**1111',
    AcquirerSdk\Binding\Expired::SHOW);

// или

/*
 * Маскированный номер карты
 * Отображение связок с истёкшим сроком действия карты
 */
$bindingsCard = AcquirerSdk\Binding\BindingsCard::byCard('411111**1111',
    AcquirerSdk\Binding\Expired::SHOW);

// или

/*
 * Идентификатор связки
 * Отображение связок с истёкшим сроком действия карты
 */
$bindingsCard = AcquirerSdk\Binding\BindingsCard::byId('bindingId',
    AcquirerSdk\Binding\Expired::SHOW);
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$bindingsCard->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU)

    // Маскированный номер карты
    ->setPan('411111**1111')

    // Идентификатор связки
    ->setBindingId('bindingId')

    // Отображение связок с истёкшим сроком действия карты
    ->setShowExpired(AcquirerSdk\Binding\Expired::SHOW);
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($bindingsCard));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    /*
     * Маскированный номер карты
     * Отображение связок с истёкшим сроком действия карты
     */
    print_r($acquirer->getBindingsByCard('411111**1111', AcquirerSdk\Binding\Expired::SHOW));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}

// или

try {
    /*
     * Идентификатор связки
     * Отображение связок с истёкшим сроком действия карты
     */
    print_r($acquirer->getBindingsById('bindingId', AcquirerSdk\Binding\Expired::SHOW));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Запрос изменения срока действия связки

Способ №1

* Создание запроса

```php
use Panda\Sberbank\AcquirerSdk;

/*
 * Идентификатор связки
 * Новая дата окончания срока действия
 */
$extend = new AcquirerSdk\Binding\Extend('bindingId', 'ГГГГММ');
```

* Установка параметров

```php
use Panda\Sberbank\AcquirerSdk;

// Использовать тестовое окружение
$extend->asTest()

    // Язык
    ->setLanguage(AcquirerSdk\Language::RU);
```

* Выполнение запроса

```php
use Panda\Sberbank\AcquirerSdk;

try {
    print_r($acquirer->request($extend));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

Способ №2

```php
use Panda\Sberbank\AcquirerSdk;

try {
    /*
     * Идентификатор связки
     * Новая дата окончания срока действия
     */
    print_r($acquirer->extendBinding('bindingId', 'ГГГГММ'));
} catch (AcquirerSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```
