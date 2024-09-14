<?php
include "inc_koneksi.php";
$Kode = $_POST['Kode'];
$Judul = $_POST['Judul'];
$Penulis = $_POST['Penulis'];
$Genre = $_POST['Genre'];
$Tanggal_Upload = $_POST['Tanggal_Upload'];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  include "img.php";
    $ekstensi_diperbolehkan = array('pdf');
    $nama = $_FILES['fileToUpload']['name'];
    $file_destination = 'File/' . $nama;

    $x = explode('.',$nama);
    $ekstensi = strtolower(end($x));
    $ekstensi_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
  

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {

      move_uploaded_file($file_tmp, $file_destination);
      
      $simpan = mysqli_query($koneksi, "INSERT INTO tbBuku VALUES ('$Kode','$Judul','$Penulis','$Genre','$Tanggal_Upload','$img','$nama')");

      if($simpan) {
        echo "<script>alert('FILE BERHASIL DI UPLOAD'); location='Input.php'</script>";
      }
      
    } else {
      //echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DIPERBOLEHKAN'); location='chek.php'</script>";
    }

        
}

?>