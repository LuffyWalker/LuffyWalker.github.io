<?php include("inc_header.php")?>
<html>
<style>
body {
    margin: 0;
    padding: 0;
    background: url(UNM.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: GARAMOND;
    font-weight: Bold;
}

</style>
<body>
<?php
include "inc_koneksi.php";
$carikode = mysqli_query($koneksi, "SELECT Kode FROM tbBuku order by Kode desc limit 1");
$datakode = mysqli_fetch_array($carikode);

if($datakode) {
  $no_terakhir = substr($datakode['Kode'], -2);
  $no = $no_terakhir + 1;

  if($no > 0 and $no <10) {
    $kode = "00".$no;
  }else if($no >10 and $no < 100){
    $kode = "0".$no;
  }else if($no > 100){
    $kode = $no;
  }
}else{
  $kode = "001";
}

$kode_otomatis = "BUNM" . $kode;

?>
<div class="container">
    <div class="row">
      <ol class="breadcrumb" style="box-shadow: 6px 6px 12px #033500; background: white;">
        <p><img src="buku.svg" width="35px" style="float: left; padding-top: 5px;">
          <h4 style="float: left; padding-top: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;Daftar Buku </h4>
        </p>
      </ol>
    </div>
</div>
<div class="container" style="
    position: ;
    top: 100%;
    left: 0px;
    background: rgba(21, 26, 24, 0.7);
    padding: 50px;
    width: 1000px;
    box-shadow: 0px 0px 25px 10px black;
    border-radius: 15px;">
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Kode Buku</label>
        <input type="read" readonly class="form-control" name="Kode" Value="<?php echo $kode_otomatis ?>">
      </div>
      <div class="form-group">
        <label>Judul Buku</label>
        <input type="text" class="form-control" name="Judul" placeholder="Masukan Judul">
      </div>
      <div class="form-group">
        <label>Nama Penulis</label>
        <input type="text" class="form-control" name="Penulis" placeholder="Masukan Nama Penulis">
      </div>
      <div class="form-group">
        <label>Genre Buku</label>
        <input type="text" class="form-control" name="Genre" placeholder="Masukan Genre Buku">
      </div>
      <div class="form-group" style="width: 216px">
        <label>Tanggal</label>
        <input type="date" class="form-control" name="Tanggal_Upload">
      </div>
      <div class="form-group">
        <label>Select image to upload:</label>
        <input class="form-control" type="file" name="imgToUpload" id="imgToUpload">
      </div>
      <div class="form-group">
        <label>Select File to upload:</label>
        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
      </div>
        <a class="btn btn-warning" href="Halaman_Utama.php">Kembali</a>
        <input class="btn btn-danger" type="submit" value="Upload Image" name="submit">
    </form>
</div>
</body>

</html>
<?php include("inc_footer.php")?>