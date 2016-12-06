<?php
require __DIR__ . '/models/news.php';

$news = getNews();
//var_dump($news);
require __DIR__ . '/views/index.php';