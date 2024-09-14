<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "e-perpus";

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("gagal koneksi");
}else{ echo "";
}


?>