<?php
require __DIR__ . '/../function/sql.php';

function getNews()
{
    connectDB();
    $query = "SELECT * FROM news ORDER BY date DESC";
    $res = mysql_query($query);
    $data = [];
    while (false !== $row = mysql_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
}

function getOneNew()
{
    connectDB();
    $id = $_GET['id'];
    $query = "SELECT * FROM news WHERE id=$id";
    $res = mysql_query($query);
    $data = [];
    while (false !== $row = mysql_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
}

function addNew()
{
    connectDB();
    $title = $_POST['title'];
    $desc = $_POST['descript'];
    $date = $_POST['date'];
    $query = "INSERT INTO news (title, descript, date) VALUES ('$title', '$desc', '$date')";
    $res = mysql_query($query);
    return $res;
}