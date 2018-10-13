<?php
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'db_rush01');

//attempts a connection
$connect = mysqli_connect('localhost','root','root','db_rush01');

if ($connect === false)
{
	die("ERROR: could not connect to database" ." ". mysqli_connect_error());
}

?>