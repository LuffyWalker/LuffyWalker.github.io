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
        $err .= "<li>Silakan Masukan NIM, Identitas dan Password Anda</li>";
    }
    if(empty($err)){
        $sql1 = "SELECT * FROM tbanggota WHERE NIM = $NIM";
        $q1 = mysqli_query($koneksi,$sql1);
        $r1 = mysqli_fetch_array($q1);
        if($r1['Password'] !=($Password)){
            $err .= "<li>Akun Tidak Ditemukan</li>";
        }
        if($r1['Identitas'] !=($Id)){
            $err .="<li>Anda Tidak memiliki Akses</li>";
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
            $err .= "<li>Kamu Tidak Memiliki Akses Ke Halaman Admin</li>";

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawsome.com/releases/v5.6.3/css/all.css">
    <title>Login Page</title>

</head>
<body>
    <form action="" method="post">
    <div class="input">
        <h1>LOGIN</h1>
        <?php
        if($err){
        echo "<ul>$err</ul>";
        }
        ?>
        <div class="box-input">
            <i class="fas fa-envelope-open-text"></i>
            <input type="text" value="<?php echo $NIM ?>" name="NIM" placeholder="NIM">
        </div>
        <div class="box-input">
            <i class="fas fa-envelope-open-text"></i>
            <input type="text" name="Identitas" placeholder="Identitas">
        </div>
        <div class="box-input">
            <i class="fas fa-lock"></i>
            <input type="Password" Id="Passwordku" name="Password" placeholder="Password">
        </div>

        <button type="submit" name="Login" class="btn-input">Login</button>
        <div class="bottom">
            
            <p>Belum Punya Akun?
                <a href="register.html">Register Disini</a>
            </p>
        </div>
    </div>
    </form>

</body>
</html>
<?php


?>