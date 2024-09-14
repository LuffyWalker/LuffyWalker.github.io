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

table {
    background: white;
    box-shadow:5px 5px 25px #033500;
}

td{
    background: rgba(22, 26, 24, 0.9);
}

h5{
    float: Center;
    padding-top: 40px;
    font-weight: Bold;"
}

    </style>
    <main>
        <body>
        <form method="GET" action="Halaman_Utama.php">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb" style="box-shadow: 6px 6px 12px #033500; background: white; display: flex; justify-content: space-between;">
                    <p class="nav_links"><img src="books.svg" width="35px" style="float: left; padding-top: 5px;">
                    <h4 style="padding-right: 863px; padding-top: 10px;">Daftar Buku </h4>
                    </p>                    
                    <p><input style="float: left; padding-top: 10px;" type="text" name="cari" placeholder="Masukan Genre Buku"
                    value="<?php if(isset($_GET['cari'])){ echo $_GET['cari'];} ?>">
                       <button style="float: left; padding-top: 10px;" type="submit">Cari</button>
                    </p>
                </ol>
            </div>
        </form>
            <br>
            <br>
           
            <table class="table table-bordered table-hover">
                <tr style="box-shadow: 2px 2px 4px #033500;">
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Genre</th>
                    <th>Tanggal Upload</th>
                    <th>Cover</th>
                    <th>Baca</th>

                </tr>
                <?php
                include 'inc_koneksi.php';
                if(isset($_GET['cari'])){
                    $pencarian = $_GET['cari'];
                    $sql = "SELECT * FROM tbbuku WHERE Genre or Judul LIKE '%$pencarian%'";
                }else{
                    $sql = "SELECT * FROM tbbuku";
                }

                $result = mysqli_query($koneksi, $sql);
                $nomor = 1;
                if($result ->num_rows > 0){
                    while($row =mysqli_fetch_array($result)){
                        $file_path = "File/" . $row['Berkas'];
                        ?>
                        <tr>
                            <td><h5><?php echo $nomor++ ?></h5></td>
                            <td><h5><?php echo $row['Kode']; ?></h5></td>
                            <td><h5><?php echo $row['Judul']; ?></h5></td>
                            <td><h5><?php echo $row['Penulis']; ?></h5></td>
                            <td><h5><?php echo $row['Genre']; ?></h5></td>
                            <td><h5><?php echo $row['Tanggal_Upload']; ?></h4></td>
                            <td class="text-center"><img class="img-circle"
                            src="File/<?php echo $row['Cover']; ?>" style="width: 120px; height: 120px;"></td>
                            <td><a href="document_det.php?Kode=<?php echo $row['Kode'] ?>" class="btn btn-success"
                                name="view" title="Baca Document" style="box-shadow: 4px 2px 2px #888888">Baca</td>
                        </tr>
                        <?php
                        
                    }
                }
                
                ?>
            </table>
        </div>
        </body>
    </main>
</html>

    <?php include("inc_footer.php")?>