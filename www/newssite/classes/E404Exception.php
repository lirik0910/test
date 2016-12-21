<?php


class E404Exception
    extends Exception
{
    //public $message;

    public function display()
    {
        $template  = '/exceptions/error_page.php';
        $view = new View();
        $view->items  = ['title' => $this->getMessage()];
        header('HTTP/1.0 404 Not Found');
        $view->display($template);
    }

}