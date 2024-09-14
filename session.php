<?php 
session_start();
if(isset($_SESSION['Admin_NIM'])){
    header("location:Home.php");
}
include "inc_koneksi.php";
$NIM = "";
$Password = "";
$err = "";
if(isset($_POST['Login'])){
    $Id = $_POST['Identitas'];
    $NIM = $_POST['NIM'];
    $Password = $_POST['Password'];
    if($NIM == '' or $Password =='' or $Id == ''){
        $err .= "<script>alert('SIlakan Masukan NIM, Identitas dan Password'); location='Index.html'</script>";
    }
    if(empty($err)){
        $sql1 = "SELECT * FROM tbanggota WHERE NIM = $NIM";
        $q1 = mysqli_query($koneksi,$sql1);
        $r1 = mysqli_fetch_array($q1);
        if($r1['Password'] !=($Password)){
            $err .= "<script>alert('Akun Tidak Ditemukan'); location='Index.html'</script>";
        }
        if($r1['Identitas'] !=($Id)){
            $err .="<script>alert('Tidak Memiliki Akses'); location='Index.html'</script>";
        }
    }
    if(empty($err)){
        $login_id = $r1['Identitas'];
        $sql1 = "SELECT * FROM id_akses WHERE login_id = '$login_id'";
        $q1 = mysqli_query($koneksi,$sql1);
        while($r1 = mysqli_fetch_array($q1)){
            $akses[] = $r1['akses_id'];
        }
        if(empty($akses)){
            $err .= "<script>alert('Tidak Memiliki Akses'); location='Index.html'</script>";

        }
    }
    if(empty($err)){
        $_SESSION['Admin_NIM'] = $NIM;
        $_SESSION['id_akses'] = $akses;
        header("location:Home.php");
        exit();
    }
}

?>
        <?php
        if($err){
        echo "<ul>$err</ul>";
        }
        ?>
