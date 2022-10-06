## Translo PHP

PHP Client for Translo API

## Installing

```
composer require timga/php-translo
```

## Translate

```php
use Translo\Translo;

require 'vendor/autoload.php';

$apiKey = 'YOUR-RAPIDAPI-KEY';
$translo = new Translo($apiKey);

$textToTranslate = "Что хочешь помнить, то всегда помнишь.";
$fromLang = "ru";
$toLang = "en";

$result = $translo->translate($textToTranslate, $fromLang, $toLang);
var_dump($result);
```

### Output:

```
array(3) {
  'ok' =>
  bool(true)
  'text_lang' =>
  string(2) "ru"
  'translated_text' =>
  string(47) "What you want to remember, you always remember."
}
```

## Batch translate

```php
use Translo\Translo;

require 'vendor/autoload.php';

$apiKey = 'YOUR-RAPIDAPI-KEY';
$translo = new Translo($apiKey);

$result = $translo->batchTranslate([
    [
        "from" => "en",
        "to" => "ru",
        "text" => "банан"
    ],
    [
        "from" => "en",
        "to" => "es",
        "text" => "Ma-ia hii\nMa-ia huu"
    ],
    [
        "from" => "auto",
        "to" => "bn",
        "text" => "bonjour"
    ]
]);
var_dump($result);
```

### Output:

```
array(2) {
  'ok' =>
  bool(true)
  'batch_translations' =>
  array(3) {
    [0] =>
    array(3) {
      'from' =>
      string(2) "en"
      'to' =>
      string(2) "ru"
      'text' =>
      string(10) "банан"
    }
    [1] =>
    array(3) {
      'from' =>
      string(2) "en"
      'to' =>
      string(2) "es"
      'text' =>
      string(20) "Ma-ia hola
Ma-ia huu"
    }
    [2] =>
    array(3) {
      'from' =>
      string(2) "fr"
      'to' =>
      string(2) "bn"
      'text' =>
      string(18) "হ্যালো"
    }
  }
}
```

## Detect

```php
use Translo\Translo;

require 'vendor/autoload.php';

$apiKey = 'YOUR-RAPIDAPI-KEY';
$translo = new Translo($apiKey);

$result = $translo->detect("Translo is the best translator in Telegram");
var_dump($result);
```

### Output:

```
array(2) {
  'ok' =>
  bool(true)
  'lang' =>
  string(2) "en"
}
```
