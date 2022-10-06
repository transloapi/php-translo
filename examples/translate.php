<?php

use Translo\Translo;

include '../vendor/autoload.php';

$apiKey = 'YOUR-RAPIDAPI-KEY';
$translo = new Translo($apiKey);

$textToTranslate = "Что хочешь помнить, то всегда помнишь.";
$fromLang = "ru";
$toLang = "en";

$result = $translo->translate($textToTranslate, $fromLang, $toLang);
var_dump($result);

/*
 *  OUTPUT:
 *  ------
 * array(3) {
 *     'ok' =>
 *     bool(true)
 *     'text_lang' =>
 *     string(2) "ru"
 *     'translated_text' =>
 *     string(47) "What you want to remember, you always remember."
 * }
 *
 */
