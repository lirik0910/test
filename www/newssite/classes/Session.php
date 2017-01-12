<?php

namespace Application\Classes;

class Session
{
    public static function error_check()
    {
        if (!empty($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    }
}