<?php

use Translo\Translo;

include '../vendor/autoload.php';

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

/*
 *  OUTPUT:
 *  ------
 * array(2) {
 *   'ok' =>
 *   bool(true)
 *   'batch_translations' =>
 *   array(3) {
 *     [0] =>
 *     array(3) {
 *       'from' =>
 *       string(2) "en"
 *       'to' =>
 *       string(2) "ru"
 *       'text' =>
 *       string(10) "банан"
 *     }
 *     [1] =>
 *     array(3) {
 *       'from' =>
 *       string(2) "en"
 *       'to' =>
 *       string(2) "es"
 *       'text' =>
 *       string(20) "Ma-ia hola
 * Ma-ia huu"
 *     }
 *     [2] =>
 *     array(3) {
 *       'from' =>
 *       string(2) "fr"
 *       'to' =>
 *       string(2) "bn"
 *       'text' =>
 *       string(18) "হ্যালো"
 *     }
 *   }
 * }
 *
 */
