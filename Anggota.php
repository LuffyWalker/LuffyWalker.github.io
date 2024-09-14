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


    </style>
    <main>
        <body>
        <div class="container">
            <div class="row">
                <ol class="breadcrumb" style="box-shadow: 6px 6px 12px #033500; background: white;">
                    <p><img src="books.svg" width="35px" style="float: left; padding-top: 5px;">
                        <h4 style="float: left; padding-top: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;Daftar Anggota</h4>
                    </p>
                </ol>
            </div>
            <br>
            <br>
           
            <table class="table table-bordered table-hover">
                <tr style="box-shadow: 2px 2px 4px #033500;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Identitas</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include 'inc_koneksi.php';
                if(isset($_GET['op'])){
                    $op = $_GET['op'];
                }else{
                    $op = "";
                }
                if($op == 'Hapus'){
                    $id = $_GET['id'];
                    $sql1 = "DELETE FROM tbanggota WHERE NIM = '$id'";
                    $q1 = mysqli_query($koneksi,$sql1);
                    if($sql1){
                        header('location: Anggota.php');
                    }else{
                        echo "Gagal";
                    }
                }
                $sql = "SELECT * FROM tbAnggota";
                $result = $koneksi->query($sql);
                $nomor = 1;
                if($result ->num_rows > 0){
                    while($row = $result ->fetch_assoc()){
                        
                        ?>
                        <tr>
                            <td><?php echo $nomor++ ?></td>
                            <td><?php echo $row['Nama']; ?></td>
                            <td><?php echo $row['NIM']; ?></td>
                            <td><?php echo $row['Identitas']; ?></td>
                            <td><?php echo $row['Password']; ?></td>
                            <td><a href="Anggota.php?op=Hapus&id=<?php echo $row['NIM']?>" onclick="return confirm('Yakin Data Akan Di Hapus??')">
                                <button type="button" class="btn btn-danger">Hapus</button></a>
                            </td>
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