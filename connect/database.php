<?php
    header('Content-Type: application/json'); 
    $host = "127.0.0.1";
    $user = "root";
    $passwd = "";
    $dbname = "krt";
    mysql_connect($host,$user,$passwd) or die ("ติดต่อ Host ไม่ได้");
    mysql_select_db($dbname) or die ("ติดต่อฐานข้อมูลไม่ได้");
    mysql_query("SET NAMES UTF8");
?>
