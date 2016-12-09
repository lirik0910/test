<?php
require __DIR__ . '/models/news.php';

$new = new News();
$onr = $new->get_one_new($_GET['id']);

//var_dump($onr);
include __DIR__ . '/views/new.php';