<?php
session_start();

require __DIR__ . '/function/add.php';

$ret = newsUpload();

require __DIR__ . '/models/news.php';

if(false != $ret){
   // var_dump($_POST);
    if(addNew()){
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

