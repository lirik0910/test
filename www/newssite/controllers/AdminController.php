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

            $add = new News();
            $add->data = [
                'title' => $title,
                'descript' => $descript,
                'date' => $date];

            if(false !== $add->insert()){
                $_SESSION['error'] = 'Новость успешно добавлена!';
                header('Location: /newssite/index.php?ctrl=Admin&act=AddNews');
                exit;
            } else {
                $_SESSION['error'] = 'Возникли ошибки!';
                header('Location: /newssite/index.php?ctrl=Admin&act=AddNews');
                exit;
            }
        }
        Session::error_check();
        AdminController::view_AddNews_form();
    }
    public static function view_AddNews_form()
    {
        $template = '/news/form_add.php';
        $view = new View($template);
        $view->display($template);
    }
    public static function inspect_post ($title, $descript, $date)
    {
        if(!empty($title) && !empty($descript) && !empty($date)){
            return true;
        }
        return false;
    }

}