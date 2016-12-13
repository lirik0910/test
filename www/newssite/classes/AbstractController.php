<?php

abstract class abstractController
{
    public static function give_to_view($data, $template)
    {
        $view = new View($template);
        $view->assign('data', $data);
        //$view->data = $data;
        $view->display($template);
    }
}