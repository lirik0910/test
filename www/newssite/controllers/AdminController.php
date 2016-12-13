<?php

class AdminController
{
    public static function actionAddNews ()
    {
        $title = $_POST['title'];
        $descript = $_POST['descript'];
        $date = $_POST['date'];

        $inspect = AdminController::inspect_post($title, $descript, $date);

        if(false !== $inspect){
            //var_dump($_POST); die;
            $add_new = News::add_news($title, $descript, $date);
            if(false !== $add_new){
                $_SESSION['error'] = 'Новость успешно добавлена!';
                header('Location: /newssite/index.php?ctrl=Admin&act=AddNews');
                exit;
            } else {
                $_SESSION['error'] = 'Возникли ошибки!';
                header('Location: /newssite/index.php?ctrl=Admin&act=AddNews');
                exit;
            }
        }
        $template = '/news/form_add.php';
        $view = new View($template);
        $view->display($template);
        //include __DIR__ . '/../views/news/form_add.php';
    }
    public static function inspect_post ($title, $descript, $date)
    {
        if(isset($title) && isset($descript) && isset($date)){
            return true;
        }
        return false;
    }
}