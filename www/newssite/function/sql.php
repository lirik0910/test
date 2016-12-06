<?php 
function connectDB()
{
	mysql_connect('localhost', 'root', '');
	mysql_select_db('test');
}
?>