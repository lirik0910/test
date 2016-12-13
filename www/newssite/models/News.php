<?php
//require __DIR__ . '/../classes/Sql.php';

class News extends AbstractModel {
    public $title;
    public $descript;
    public $date;
    public $id;

    protected static $table = 'news';
    protected static $class = 'News';

    public static function add_news($title, $descript, $date)
    {
        $db = new Sql();
        return $db->put_to_DB("INSERT INTO news (title, descript, date) VALUES ('$title', '$descript', '$date')", self::$class);

    }
}








