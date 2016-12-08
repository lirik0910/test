<?php

abstract class Article{
    public $title;
    public $descript;
    public $date;
}

class News extends Article{
    public function get_news($res)
    {
        $data = [];
        while (false !== $row = mysql_fetch_assoc($res)){
            $data[] = $row;
        }
        return $data;
    }
}