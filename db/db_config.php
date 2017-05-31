<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//���Ʈw�]�w
$dsn = "mysql:host=localhost:3306;dbname=mud";
$db = new PDO($dsn, "root","");
$db->query("set names utf8");
$db_table = array("account","role");
$table1_structure = array("username","password","time");
$table2_structure = array("nickname","sex","role","username");
?>
