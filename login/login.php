<?php
include_once('../connect/database.php');
session_start();

$username=$_POST['username'];
$password=$_POST['password'];
/* บรรทัด 7 8 10 ที่ต้องมี*/
$sql = "SELECT * FROM `tb_employee` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
$res = mysql_query($sql);
$result=mysql_num_rows($res);
$name=mysql_fetch_assoc($res);/*เอาข้อมูลออกมาใช้*/

    if($result > 0){
            
        $_SESSION['id']=$name['id'];
        $_SESSION['name']=$name['name'];
        $_SESSION['status']=$name['status'];
        $_SESSION['position']=$name['position'];
    }
   echo json_encode(array("flag"=>$result));   


       


?>
