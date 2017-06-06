<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//���Ʈw�]�w
$dsn = "mysql:host=mysql.cs.ccu.edu.tw;dbname=lcp102u_mud";
$db = new PDO($dsn, "lcp102u","aqwe123851");
$db->query("set names utf8");
$db_table = array("account","role");
$table1_structure = array("username","password","time");
$table2_structure = array("nickname","sex","role","username");
?>
