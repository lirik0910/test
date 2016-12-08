<?php
require __DIR__ . '/../function/sql.php';

require __DIR__ . '/../classes/classes.php';

function getNews()
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
}






