<?php include "inc_header.php" ?>
<?php include "inc_koneksi.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Perpus</title>
    <style>
        body{
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

        h1{
            width: 650px;
            margin: auto;
            font-weight: Bold;
            Font-size: 60px;
            font-family: "brush script mt";
            color: #033500;
            text-align: center;
        }

        h2{
            Font-size: 50px;
            font-family: "Time New Roman";
            color: #033500;
            width: 1000px;
            margin: auto;
            margin-top: 15px;
            text-align: center;
        }
        h3{
            font-weight: bold;
            font-family: GARAMOND;
            color: #033500;
        }

        .content{
            width: 300;
            margin: 300;
            margin-top: 30px;
            background: rgba(22, 26, 24, 0.9);
            padding: 50px;
            box-shadow: 0px 0px 25px 10px black;
            border: solid 5px #0b6623;
            border-radius: 15px;
        }

        tbody{
            font-size: 20px;
            font-weight: 300 100;
            color: #e8e8e8;
        }

        th{
            color: white;
        }


    </style>
</head>
<body>
    <h1>Selamat Datang di E-Perpus UN Manado</h1>
    <h2>Selamat Membaca </b></h2>
    <h3>Buku Terkini</h3>
    <div class="content">
    <table class="table table-responsive" border="0" width="50%">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Cover</th>
        </tr>
    </thead>
    <tbody>
        <?php
         include 'inc_koneksi.php';
         $sql = "SELECT * FROM tbBuku ORDER BY Kode DESC LIMIT 1";
         $result = $koneksi->query($sql);
         $nomor = 1;
         if($result ->num_rows > 0){
             while($row = $result ->fetch_assoc()){
                 $file_path = "File/" . $row['Berkas'];
                 ?>
                 <tr>
                     <td><?php echo $row['Judul']; ?></td>
                     <td><?php echo $row['Penulis']; ?></td>
                     <td class="text-center"><img class="img-circle"
                     src="File/<?php echo $row['Cover']; ?>" style="width: 100px; height: 125px;"></td>
                 </tr>
                 <?php
                 
             }
         }
        ?>
    </tbody>
    </table>
    </div>
</body>
</html>
<?php include "inc_footer.php" ?>