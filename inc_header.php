<?php
session_start();
include ("inc_koneksi.php");
if(!isset($_SESSION['Admin_NIM'])){
  header("location:Index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <style>
    a{
      font-family: GARAMOND;
      font-weight: Bold;
    }
  </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Perpus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="container">
    <header>
    <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color: #033500;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-Perpus</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Halaman_Utama.php">Daftar Buku</a>
        </li>
        <?php
        if(in_array("Admin",$_SESSION['id_akses'])){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="Input.php">Tambah Buku</a>
        </li>
        <?php
        }
        ?>
        <?php
        if(in_array("Admin",$_SESSION['id_akses'])){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="Anggota.php">Daftar Anggota</a>
        </li>
        <?php
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="Logout.php">logout>>></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>