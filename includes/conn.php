<?php
$user = 'db_username';
$password = 'db_password';
$server = 'localhost';
$dbname = 'db_name';

$link = mysql_connect($server, $user, $password);
mysql_set_charset('utf8',$link);
$db = mysql_select_db($dbname, $link);
?>