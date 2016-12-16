<?php

class Sql{

    private $dbh;
    private $className = 'stdCLass';

    public function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=test; host=localhost', 'root', '');
    }
    public function set_classname($className)
    {
        $this->className = $className;
    }
    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }
    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    /*
    public function put_to_DB($query, $class='stdClass')
    {
        return $res = mysql_query($query);
    }
    public function get_from_DB_All($query, $class='stdClass')
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
    public function get_from_DB_One($query, $class='stdClass')
    {
        return $this->get_from_DB_All($query, $class) [0];
    }
    */
}