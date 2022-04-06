<?php

session_start();
include 'connect.php';

$username=$_POST['username'];
$password=md5($_POST['password']);


$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from login where username='$username' and password='$password'");
$xxx=mysqli_num_rows($query);
if ($xxx==TRUE) {
$data = mysqli_fetch_array($query);
  $_SESSION['username']=$username;
  $_SESSION['password']=$password;
  $_SESSION['level']=$data['level'];
  $_SESSION['id_user']=$data['kd_user'];
  $_SESSION["jabatan"]=($data["jabatan"]);
  $_SESSION["bagian"]=($data["bagian"]);
  $_SESSION["namalengkap"]=$data["nama"];	
  $_SESSION["inisial"]=$data["inisial"];  
 
			
  echo "<script>
  location='index.php';</script>";
}
else{
  echo "<script> alert ('username atau password salah');
  location='../index.php';</script>";
  # code...
}
?>