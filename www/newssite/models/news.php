<?php
require __DIR__ . '/../classes/classes.php';

abstract class Article{
    public $title;
    public $descript;
    public $date;
}

class News extends Article{
    public $id;
    public static function get_news()
    {
        $db = new Sql();
        return $db->get_from_DB('SELECT * FROM news ORDER BY date DESC');
    }
    public function get_one_new($id)
    {
        $db = new Sql();
        $this->id = $id;
        return $db->get_from_DB('SELECT * FROM news WHERE id='.$this->id, 'News');
    }
    public function add_news($title, $descript, $date)
    {
        $db = new Sql();
        $this->title = $title;
        $this->descript = $descript;
        $this->date = $date;
        return $db->put_to_DB("INSERT INTO news (title, descript, date) VALUES ('$this->title', '$this->descript', '$this->date')");

    }
    public function inspect_post ($title, $descript, $date)
    {
        if(isset($title) && isset($descript) && isset($date)){
            return true;
        }
        return false;
    }
   /* public function upload_news()
    {
        $this->title = $_POST['title'];
        $this->descript = $_POST['descript'];
        $this->date = $_POST['date'];
        if(!empty($this->title) && !empty($this->descript) && !empty($this->date)){
            return true;
        }
        return false;
    }*/
}

/*function getNews()
{
    $getnews = new Sql();
    $res = $getnews -> get_from_DB('*', 'news', 'date', 'DESC');
    $get_news = new News();
    $data = $get_news -> get_news($res);

    //$query = "SELECT * FROM news ORDER BY date DESC";
    //$res = mysql_query($query);
    //$data = [];
    //while (false !== $row = mysql_fetch_assoc($res)){
        //$data[] = $row;
    //}
    return $data;
}

function getOneNew()
{
    $getonenew = new Sql();
    $id = $_GET['id'];
    $res = $getonenew -> get_from_DB('*', 'news', '', '', 'id', $id);
    $get_one_new = new News();
    $data = $get_one_new -> get_news($res);
    //$query = "SELECT * FROM news WHERE id=$id";
    //$res = mysql_query($query);
    //$data = [];
    //while (false !== $row = mysql_fetch_assoc($res)){
        //$data[] = $row;
    //}
    return $data;
}

function addNew()
{
    //connectDB();
    $addnew = new Sql();
    $add_new = new News();
    $add_new->title = $_POST['title'];
    $add_new->descript = $_POST['descript'];
    $add_new->date = $_POST['date'];
    $res = $addnew->insert_to_DB('news', 'title','descript', 'date',  $add_new->title, $add_new->descript, $add_new->date);

    //$query = "INSERT INTO news (title, descript, date) VALUES ('$title', '$desc', '$date')";
    //$res = mysql_query($query);
    return $res;
}*/






