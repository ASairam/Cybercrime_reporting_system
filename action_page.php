<?php
include "connection.php";

$uname=$_POST['uname'];
$psw=$_POST['psw'];

$sql="select * from admin where Username='$uname' and Password='$psw' ";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
     header("location:view.php"); 
 }
 else{
     header("location:index.php");
 }
?>   