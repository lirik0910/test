<?php

class Sql{
    public function __construct()
    {
        mysql_connect('localhost', 'root', '');
        mysql_select_db('test');
    }
    public function put_to_DB($query, $class='stdClass')
    {
        return $res = mysql_query($query);
    }
    public function get_from_DB($query, $class='stdClass')
    {
        $res = mysql_query($query);
        //var_dump($res);
        if(false === $res){
            return false;
        }
        $ret = [];
        while($row = mysql_fetch_object($res)){
            $ret[] = $row;
        }
        return $ret;
    }
}