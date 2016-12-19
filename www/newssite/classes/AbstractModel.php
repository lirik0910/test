<?php

abstract class AbstractModel
{
    protected static $table;
    protected static $class;
    public $id;
    public $data = [];

    public static function get_all()
    {
        $class = get_called_class();
        //var_dump($class); die;
        $db = new Sql();
        $db->set_classname($class);
        return $db->query('SELECT * FROM ' . static::$table . ' ORDER BY date DESC');
    }
    public function get_one_by_PK($id)
    {
        $class = get_called_class();
        $db = new Sql();
        //$this->id = $id;
        $db->set_classname($class);
        $this->id = $id;
        //var_dump(static::$id);
        return $db->query('SELECT * FROM ' . static::$table . ' WHERE id=:id', [':id' => $id]);
    }
    public function get_by_column($col, $value)
    {
        $class = get_called_class();
        $db = new Sql();
        $db->set_classname($class);
        //$cols = array_keys($this->data);
        return $db->query('SELECT * FROM ' . static::$table . ' WHERE ' . $col . '=:col', [':col' => $value]);
    }
    public static function get_columns($data)
    {
        $key = [];
        foreach ($data as $col => $value){
            if($col !== 'id' && $col !== 'data'){
                $key[] = $col;
            } else{
                continue;
            }
        }
        return $key;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        var_dump($value);
    }
    public function __get($name)
    {
        return $this->data[$name];
    }
    public function __isset($name)
    {
        return isset($this->data[$name]);
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
        $result = $db->execute($sql, $data);
        if(true == $result){
            $this->id = $db->lastInsertId();
        }
        //var_dump($this->id);
        return $result;
    }
    public function update()
    {
        //var_dump($this->id); die;
        $data = [];
        $values = [];
        foreach ($this->data as $key => $value){
            $data [] = $key . '=:' . $key;
            $values [':' . $key] = $value;
        }
        //var_dump($this->data); die;
        $values[':id'] = $this->id ;
        //var_dump($values);  die;
        $db = new Sql();
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $data) . ' WHERE id=:id';
        //echo $sql;
        return $db->execute($sql, $values);
    }
    public function delete()
    {
        //var_dump(static::$id); die;
        $db = new Sql();
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=' . $this->id;
        $db->execute($sql);
    }
    public function save()
    {
        if(!empty($this->id)){
            $this->insert();
        } else {
            $this->update();
        }
    }
}