<?php
//require __DIR__ . '/../models/News.php';
//require_once __DIR__ . '/../autoload.php';

class NewsController extends AbstractController
{
    public function actionAll()
    {
        $data = News::get_all();
        //var_dump($data); die;
        $template = '/news/all.php';
        /*$view = new View($template);
        $view->data = $data;
        //var_dump($argc); die;
        $view->display($template);*/
        Session::error_check();
        NewsController::give_to_view($data, $template);

    }
    public function actionOne()
    {
        $id = $_GET['id'];
        $news = new News();
        $data = $news->get_one_by_PK($id) [0];
        $template = '/news/one.php';
        Session::error_check();
        NewsController::give_to_view($data, $template);

    }
    public function actionFind()
    {
        $data = News::get_all() [0];

        $template_form = '/news/findform.php';
        $template_view = '/news/Findnews.php';
        $view = new View();
        $view->cols = News::get_columns($data);

        $news = new News();

        if(!empty($_POST['value'])){
            switch ($_POST['column']){
                case ('title'):
                    if(false !== $view->items = $news->get_by_column('title', $_POST['value']) [0] ){
                        //var_dump($view->items); die;
                        $view->display($template_view);
                    } else {
                        $_SESSION['error'] = 'Новости по заданным параметрам не обнаружено!';
                        header('Location: /newssite/index.php?ctrl=News&act=Find');
                        exit;
                    }
                    break;
                case ('descript'):
                    if(false !== $view->items = $news->get_by_column('descript', $_POST['value']) [0] ){
                        $view->display($template_view);
                    } else {
                        $_SESSION['error'] = 'Новости по заданным параметрам не обнаружено!';
                        header('Location: /newssite/index.php?ctrl=News&act=Find');
                        exit;
                    }
                    break;
            }
        } elseif (!empty($_POST['date'])){
            if(false !== $view->items = $news->get_by_column('date', $_POST['date']) [0] ){
                //var_dump($view->items); die;
                $view->display($template_view);
            } else {
                $_SESSION['error'] = 'Новости по заданным параметрам не обнаружено!';
                header('Location: /newssite/index.php?ctrl=News&act=Find');
                exit;
            }
        }
        Session::error_check();
        $view->display($template_form);

    }

}