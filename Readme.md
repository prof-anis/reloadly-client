# PHP LIBRARY FOR INTERACTING WITH THE RELOADLY API
> this package is still in development. breaking changes can still be made!
This package allows you to integrate the Reloadly airtime/data API into your application without breaking a sweat. 

## Installation
composer require busybrain/reloadly


## Usage
  First instantiate an object of the class.

```php
<?php
  require "vendor/autoload.php";
  use Tobexkee\Reloadly\Reloadly;
  
  
  $client = new Reloadly($client_id, $client_secret, $audience);
  
```
  The audience argument has a default value of andbox. Set it to live to go live

## available methods
The package covers all the available reloadly API. 
### Countries
To access the countries API, use the country method. This returns an instance of the Country
API class hence you can call the fetch method to retrieve the countries.
```
<?php
$countries = $reloadly->countries()->fetch();
```
you can also retrieve a single country by ISO
```php
<?php
$country = $reloadly->countries()->fetch('NG');
```
  
### Transactions 
You can retrieve the transactions by calling the transactions method on the client.
This returns an instance of the transactions API class hence you can call the fetch method to retrieve the transactions
```php
$transactions = $reloadly->transactions()->fetch();
```
You can also retrieve a single transaction using it ID
```php
$transactions = $reloadly->transactions()->fetch($transaction_id);
```

### Topup
The topup method returns an instance of the Topup API class where you can call the send method 
to transfer airtime or data to a user. 
```php
$sendTopup = $reloadly->topup()->send($data);
```
The $data argument are the expected parameters from the relaodly API

### FXrate
The fxrate method returns and instance of the Fxrate API class . Calling the fetch method on it 
fetches the fxrates of an expected transaction. 
```php
$rate = $reloadly->fxrate()->fetch($operatorId,  $amount);
```

### Promotions
The promotions method on the client returns an instance of the Promotions API class that allows you to fetch the available
promotions based on different parameters
```
$promotions = $reloadly->promotions()->fetchById($id);

$promotions = $reloadly->promotions()->fetchByCountry($country_code);

$promotions = $reloadly->promotions()->fetchByOperator($operator);

$promotions = $reloadly->promotions()->fetch($data); //returns all promotions based all filters set in the $data array

```

###Operators 
The operators method on the client returns an instance of the Operators API class
that provides you with different methods to fetch operators details

```php
$operators = $reloadly->operators()->fetch(); //fetch all operators.

$operators = $reloadly->operators()->fetchById($id); //fetch operator by ID 

$operators = $reloadly->operators()->fetchByIso($iso); //fetch operator by ISO

$operators = $reloadly->operators()->fetchByPhone($phone, $country_iso); //fetch operator by phone number

```
Each of the methods can take an optional $data associative array argument to add additional filters to the search.

### Discount 
The discount method on the client returns an instance of the Discount API class with two methods that allows you to fetch data from the discount API

```php
$discounts = $reloadly->discount()->fetch(); //fetch all discounts

$discount = $reloadly->discount()->fetchById($id); //fetch discount by ID

```

### Account
The account method on the client returns an instance of the Account API class which contains  a single balance method to retrieve your account balance
```
$balance = $reloadly->account()->balance();
```


## Contribution
if you want to contribute to this project, dont wait for another second, fork and start sending in your PR's 
