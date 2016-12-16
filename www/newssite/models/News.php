<?php
//require __DIR__ . '/../classes/Sql.php';

class News extends AbstractModel {

    public $title;
    public $descript;
    public $date;
    public $id;

    protected static $table = 'news';
    protected static $class = 'News';

}








