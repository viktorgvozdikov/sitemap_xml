# Генерация sitemap в формате xml

## Установка

```composer require modulebz/sitemap_xml```

### Пример использования 

Просто создаём новый объект sitemap, добавляем в него ссылки и получаем строку в формате xml

```php
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
```

### Результат 

```xhtml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://www.sitemaps.org/</loc>
        <lastmod>2020-03-07</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc>https://www.sitemaps.org/protocol.html</loc>
        <lastmod>2020-03-07</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.1</priority>
    </url>
    <url>
        <loc>https://www.sitemaps.org/protocol.html</loc>
    </url>
</urlset>
```
