<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//資料庫設定
$dsn = "mysql:host=localhost:3306;dbname=mud";
$db = new PDO($dsn, "root","");
$db->query("set names utf8");
?> 
