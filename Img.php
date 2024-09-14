<?php
include "inc_koneksi.php";
$ekstensi_boleh = array('jpg','png');
    $img = $_FILES['imgToUpload']['name'];
    $file_tujuan = 'File/' . $img;

    $y = explode('.',$img);
    $eks = strtolower(end($y));
    $eks_size = $_FILES['imgToUpload']['size'];
    $img_tmp = $_FILES['imgToUpload']['tmp_name'];
  

    if(in_array($eks, $ekstensi_boleh) === true)  {

      move_uploaded_file($img_tmp, $file_tujuan);


    }
?>