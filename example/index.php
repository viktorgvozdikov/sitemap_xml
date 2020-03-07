<?php

use ModuleBZ\Sitemap;
use ModuleBZ\Sitemap\EChangeFreq;
include_once("../vendor/autoload.php");

$sitemap = (new Sitemap())
    ->addLink('https://www.sitemaps.org/',time(),0.1,EChangeFreq::MONTHLY)
    ->addLink('https://www.sitemaps.org/protocol.html',date('Y-m-d',time()),0.1,EChangeFreq::MONTHLY)
    ->addLink('https://www.sitemaps.org/protocol.html')
;


// Выводим сразу xml файл с необходимыми заголовками
$sitemap->echoXml();
// Или сначала смотрим получившийся код в формате строки
// echo htmlspecialchars($sitemap);
