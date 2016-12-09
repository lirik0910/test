<?php
require __DIR__ . '/models/news.php';

$news = News::get_news();
//var_dump($news);
include __DIR__ . '/views/index.php';