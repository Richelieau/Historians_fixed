<?php
session_start();
include "config.php";

$u = $_POST['username'];
$p = $_POST['password'];

$q = mysqli_query($conn,"SELECT * FROM users 
                         WHERE username='$u' 
                         AND password='$p'");

$data = mysqli_fetch_assoc($q);

if($data){

  $_SESSION['login']=true;
  $_SESSION['role']=$data['role'];

  if($data['role']=="admin"){
    header("Location: admin/dashboard.php");
  } else {
    header("Location: index.php");
  }

} else {
  echo "Login gagal";
}
