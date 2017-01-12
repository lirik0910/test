<?php



use Application\Classes\View;

abstract class abstractController
{
    public static function give_to_view($data, $template)
    {
        $view = new View($template);
        //$view->assign('data', $data);
        $view->items = $data;
        $view->display($template);
    }
}