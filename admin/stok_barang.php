<?php
session_start();
include '../koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Kasir Skaone</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-right">
    <a href="pendataan_barang.php" class="btn btn-primary btn-sm text-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
    </svg> Tambah Data Barang</a>
</div><br>
    <div class="container text-center">  
           <table class="table" style="width: 100%" border="1">
            <thead>
           <tr>
                    <th>No</th>
                    <th>Nama produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Foto</th>
                    <th>Aksi</th>
        </tr>
        </thead>
        <?php
        $query= mysqli_query($koneksi, "SELECT * FROM produk");
        $no = 1;
        while ($id = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td> <?= $no++ ?></td>
                <td> <?= $id['nama_produk'] ?></td>
                <td> <?= $id['harga'] ?></td>
                <td> <?= $id['stok'] ?></td>
                <td> <?= $id['foto'] ?></td>
                <td><a href='stok_barangedit.php?id=<?= $id['id'] ?>' class="btn btn-outline-success btn-sm">Edit</a> 
                 <a href='delete.php?id=<?=$id['id']?>' class="btn btn-outline-danger btn-sm">Delete</a></td>
        </tr>
            <?php } ?>
        </table>
        </div>
   
</body>
</html>