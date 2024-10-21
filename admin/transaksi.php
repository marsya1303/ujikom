<?php
session_start();
include '../koneksi.php';
?>
<html>
    <head>
        <link  rel="stylesheet" type="text/css" href="../text.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    </head>
    <body>
<div class="container text-center">  
           <table class="table" style="width: 100%" border="1">
            <thead>
           <tr>
                    <th>No</th>
                    <th>Nama produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
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
                <td><a href='../masyarakat/beli.php?produk=<?= $id['id'] ?>&harga=<?= $id['harga'] ?> ' class="btn btn-success btn-sm">Beli</a> 
        </tr>
            <?php } ?>
        </table>
        </div>
        <div class="container text-end">
        <a href='pembayaran.php' class="btn btn-primary btn-sm">Order</a>
        </div>
        </body>
        </html>