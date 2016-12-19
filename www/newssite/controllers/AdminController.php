<?php

class AdminController extends AbstractController
{
    public function actionAddNews ()
    {
        $inspect = AdminController::inspect_post($_POST['title'], $_POST['descript'], $_POST['date']);

        if(false !== $inspect){

            $add = new News();
            $add->data = [
                'title' => $_POST['title'],
                'descript' => $_POST['descript'],
                'date' => $_POST['date']];

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
    public function actionUpdate()
    {
        if(!empty($_POST['title']) && !empty($_POST['descript'])){

                $upd = new News();
                $upd->id = $_GET['id'];
                $upd->data=['title' => $_POST['title'],
                            'descript' => $_POST['descript']];
                //var_dump($upd->data); die;

                if(false !== $upd->update()){
                    $_SESSION['error'] = 'Новость успешно обновлена!';
                    header('Location: /newssite/index.php?ctrl=News&act=One&id=' . $upd->id);
                    exit;
                } else {
                    $_SESSION['error'] = 'Возникли ошибки!';
                    header('Location: /newssite/index.php?ctrl=Admin&act=Update');
                    exit;
                }
        }
        Session::error_check();
        $template = 'news/update_form.php';
        $view = new View();
        $view->display($template);

    }
    public function actionDelete ()
    {
        $del = new News();
        $del->id = $_GET['id'];
        $del->delete();
        $_SESSION['error'] ='Новость успешно удалена!';
        header('Location: /newssite/index.php');
        exit;
    }

}