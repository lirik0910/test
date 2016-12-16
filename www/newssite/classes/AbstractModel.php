<?php

abstract class AbstractModel
{
    protected static $table;
    protected static $class;
    public $data = [];

    public static function get_all()
    {
        $class = get_called_class();
        //var_dump($class); die;
        $db = new Sql();
        $db->set_classname($class);
        return $db->query('SELECT * FROM ' . static::$table . ' ORDER BY date DESC');

        /*$db = new Sql();
        $query = 'SELECT * FROM ' . static::$table . ' ORDER BY date DESC';
        return $db->get_from_DB_All($query, static::$class);*/
    }
    public static function get_one_by_PK($id)
    {
        $class = get_called_class();
        $db = new Sql();
        //$this->id = $id;
        $db->set_classname($class);
        return $db->query('SELECT * FROM ' . static::$table . ' WHERE id=:id', [':id' => $id]);
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __get($name)
    {
        return $this->data[$name];
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $ins = [];
        $data = [];
        foreach ($cols as $col){
            $ins[] = ':' . $col;
            $data [':' . $col] = $this->data[$col];
        }
        $sql = 'INSERT INTO ' . static::$table . ' ('. implode(', ', $cols) . ') VALUES ('. implode(', ', $ins) . ')';
        $db = new Sql();
        $db->execute($sql, $data);
    }
}