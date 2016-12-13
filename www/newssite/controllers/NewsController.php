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
        NewsController::give_to_view($data, $template);
    }
    public function actionOne()
    {
        $id = $_GET['id'];
        $data = News::get_one($id);
        //var_dump($data); die;
        $template = '/news/one.php';
        /*$view = new View($template);
        $view->data = $data;
        //var_dump($argc); die;
        $view->display($template);*/
        NewsController::give_to_view($data, $template);
    }

}