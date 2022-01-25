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
var_dump($res);

```
