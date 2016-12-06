<?php
require __DIR__ . '/models/news.php';

$new = getOneNew();
//var_dump($new);
include __DIR__ . '/views/new.php';