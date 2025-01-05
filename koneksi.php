<?php 
$host           = "localhost";
$user           = "root";
$password       = "";
$db             = "senja";

$kon            = mysqli_connect($host,$user,$password,$db);
if(!$kon){
    die("Gagal terkoneksi:".mysqli_connect_error());
}
?>