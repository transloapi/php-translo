<?php

use Translo\Translo;

include '../vendor/autoload.php';

$apiKey = 'YOUR-RAPIDAPI-KEY';
$translo = new Translo($apiKey);

$result = $translo->detect("Translo is the best translator in Telegram");
var_dump($result);

/*
 *  OUTPUT:
 *  ------
 * array(2) {
 *     'ok' =>
 *     bool(true)
 *     'lang' =>
 *     string(2) "en"
 * }
 *
 */
