<?php
$conn = mysqli_connect("localhost","root","","Historians_fixed");

if(!$conn){
    die("Koneksi gagal: ".mysqli_connect_error());
}
?>
