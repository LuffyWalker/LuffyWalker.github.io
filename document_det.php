<?php include "inc_header.php"?>

<div class="container">
    <div class="row">
        <ol class="breadcrumb" style="box-shadow: 6px 6px 12px #033500; background: white;">
            <p><img src="Openbooks.svg" width="45px" style="float: left; padding-top: 5px;">
                <h4 style="font-family: GARAMOND; font-weight: Bold; float: left; padding-top: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;Baca Buku</h4>
            </p>
        </ol>
    </div>
</div>
<form class="" method="GET">
<?php
include "inc_koneksi.php";
if(isset($_GET['Kode']))
$kode = $_GET['Kode'];
$sql = "SELECT Berkas FROM tbBuku WHERE Kode='$kode'";
                $result = $koneksi->query($sql);
                $nomor = 1;
                if($result ->num_rows > 0){
                    while($row = $result ->fetch_assoc()){
                        $file_path = "File/" . $row['Berkas'];
    ?>
    <embed src="File/<?php echo $row['Berkas'] ?>" type="application/pdf" width="100%" height="570px"/>

        <?php
                    }}
?>
</form>
<?php include "inc_footer.php" ?>