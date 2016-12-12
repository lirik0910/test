<?php
//require __DIR__ . '/../models/News.php';
require_once __DIR__ . '/../autoload.php';

class NewsController
{
    public static function actionAll()
    {
        $news = News::get_news();
        include __DIR__ . '/../views/news/all.php';
    }
    public function actionOne()
    {
        $id = $_GET['id'];
        $one = News::get_one_new($id);
        include __DIR__ . '/../views/news/one.php';
    }
    public function actionAdd ()
    {
        $add = new News();
        $inspect = $add->inspect_post($_POST['title'], $_POST['descript'], $_POST['date']);

        if(false !== $inspect){
            $add_new = $add->add_news($_POST['title'], $_POST['descript'], $_POST['date']);
            if(false !== $add_new){
                $_SESSION['error'] = 'Новость успешно добавлена!';
                header('Location: /newssite/index.php?ctrl=News&act=Add');
                exit;
            } else {
                $_SESSION['error'] = 'Возникли ошибки!';
                header('Location: /newssite/index.php?ctrl=News&act=Add');
                exit;
            }
        }

        include __DIR__ . '/../views/news/form_add.php';
    }
}