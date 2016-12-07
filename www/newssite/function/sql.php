<?php 
function connectDB()
{
	mysql_connect('localhost', 'root', '');
	mysql_select_db('test');
}
class Sql{
    protected $host;
    protected $login;
    protected $pass;
    protected $db_name;
    public function __construct($host='localhost', $login='root', $pass='', $db_name='test')
    {
        mysql_connect($host, $login, $pass);
        mysql_select_db($db_name);
    }
    public function insert_to_DB($table_name, $row1, $row2, $row3, $value1, $value2, $value3)
    {
        $sql = "INSERT INTO $table_name ($row1, $row2, $row3) VALUES ('$value1','$value2', '$value3')";
        mysql_query($sql);
    }
    public function update_DB($table_name, $row, $insert_vlaue, $id)
    {
        $sql = "UPDATE $table_name SET $row=$insert_vlaue WHERE id=$id";
        mysql_query($sql);
    }
    public function get_from_DB($row, $table_name, $sort_by='', $sort_value='', $if_row='', $if_row_value='')
    {
        if($if_row !== '' && $if_row_value !== ''){
            if($sort_by == '' && $sort_value == ''){
                $sql = "SELECT $row FROM $table_name WHERE $if_row=$if_row_value";
                return mysql_query($sql);
            } elseif($sort_by !== '' && $sort_value !== '') {
                $sql = "SELECT $row FROM $table_name WHERE $if_row=$if_row_value ORDER BY $sort_by $sort_value";
                return mysql_query($sql);
            }
        } elseif ($if_row == '' && $if_row_value == '') {
            if($sort_by == '' && $sort_value == ''){
                $sql = "SELECT $row FROM $table_name";
                return mysql_query($sql);
            } elseif ($sort_by !== '' && $sort_value !== ''){
                $sql = "SELECT $row FROM $table_name ORDER BY $sort_by $sort_value";
                return mysql_query($sql);
            }
        }
    }
}
?>