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