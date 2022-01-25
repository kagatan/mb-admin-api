# mb-admin-api
MB admin API


 
## Installation

Install using composer:

```bash
composer require kagatan/mb-admin-api
```

or dev version
```bash
composer require kagatan/mb-admin-api:dev-main
```


## Example

```php

<?php

use Kagatan\MikBillAdminAPI\AdminAPI;

include_once('vendor/autoload.php');

$login = 'admin'; // admin user
$pass = 'user_password';  // admin pass
$host = 'http://admin2x.loc'; // url admin

$mbAPI = new AdminAPI($login, $pass, $host);

// Проверим авторизацию в биллинге
$res = $mbAPI->checkLoggedIn();

// Получить всех абонентов
//$res = $mbAPI->getUsers(); 

// Получить абонентов с фильтрацией по уид
$res = $mbAPI->getUsers([
    'uid' => 34579
]);

var_dump($res);

```

## Methods

### checkLoggedIn
**Описание:** проверка авторизации в биллинге сотрудника


### getUsers
**Описание:** получить пользователей (запрос тяжелый)

**URI:** /json/users/searchflex

**Параметры:** 
 - uid - uid пользователя
 
 
### getUsersHistoryPayments

**Описание:** получить историю плтажей

**URI:** /json/users/statpaymfl

**Параметры:** 
  - uid:7 - uid пользователя
  - from_date: 2021-12-28 - "дата от"
  - to_date: 2021-12-31 - "дата до"
  
 