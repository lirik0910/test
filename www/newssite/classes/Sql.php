<?php

namespace Application\Classes;

class Sql{

    private $dbh;
    private $className = 'stdCLass';

    public function __construct()
    {
            if(false == $this->dbh = new \PDO('mysql:dbname=test; host=localhost', 'root', '')){
                throw $e403 = new \PDOException();
            }
            //$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    }
    public function set_classname($className)
    {
        $this->className = $className;
    }
    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $this->className);
    }
    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}