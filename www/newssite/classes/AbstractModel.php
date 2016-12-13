<?php

abstract class AbstractModel
{
    protected static $table;
    protected static $class;

    public static function get_all()
    {
        $db = new Sql();
        $query = 'SELECT * FROM ' . static::$table . ' ORDER BY date DESC';
        return $db->get_from_DB_All($query, static::$class);
    }
    public static function get_one($id)
    {
        $db = new Sql();
        //$this->id = $id;
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id='. $id;
        return $db->get_from_DB_One($query, static::$class);
    }

}