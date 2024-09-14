<?php
require 'inc_koneksi.php';
$Nama = $_POST["Nama"];
$NIM = $_POST["NIM"];
$Password = $_POST["Password"];
$Id = $_POST["Identitas"];

$query_sql ="INSERT INTO tbAnggota (Nama, NIM, Password, Identitas) 
            VALUE ('$Nama', '$NIM', '$Password','$Id')";

if (mysqli_query($koneksi, $query_sql)) {
    header("location: Index.php");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}