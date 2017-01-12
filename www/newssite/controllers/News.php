<?php
//require __DIR__ . '/../models/News_model.php';
//require_once __DIR__ . '/../autoload.php';
namespace Application\Controllers;

use Application\Classes\Session;
use Application\Classes\E404Exception;
use Application\Models\News as NewsModel;
use Application\Classes\View;


class News extends \AbstractController
{
    public function actionAll()
    {
        if(false == $data = $data = NewsModel::get_all()){
            $e404 = new E404Exception('Ошибка 404! Не найдена запрашиваемая страница');
            throw $e404;
        }
        $template = '/news/all.php';
        Session::error_check();
        News::give_to_view($data, $template);

    }
    public function actionOne()
    {
        $id = $_GET['id'];
        $news = new NewsModel();
        if(false == $data = $news->get_one_by_PK($id) [0]){
            $e404 = new E404Exception('Ошибка 404! Не найдена запрашиваемая страница');
            throw $e404;
        }
        $template = '/news/one.php';
        Session::error_check();
        News::give_to_view($data, $template);

    }
    public function actionFind()
    {
        $data = NewsModel::get_all() [0];

        $template_form = '/news/findform.php';
        $template_view = '/news/Findnews.php';
        $view = new View();
        $view->cols = NewsModel::get_columns($data);

        $news = new NewsModel();

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