<?php
session_start();

require __DIR__ . '/models/news.php';

$add = new News();
$inspect = $add->inspect_post($_POST['title'], $_POST['descript'], $_POST['date']);

//var_dump($inspect);

if(false !== $inspect){
    $add_new = $add->add_news($_POST['title'], $_POST['descript'], $_POST['date']);
    if(false !== $add_new){
        $_SESSION['error'] = 'Новость успешно добавлена!';
        header('Location: /newssite/addnew.php');
        exit;
    } else {
        $_SESSION['error'] = 'Возникли ошибки!';
        header('Location: /newssite/addnew.php');
        exit;
    }
}

include __DIR__ . '/views/form_add.php';

