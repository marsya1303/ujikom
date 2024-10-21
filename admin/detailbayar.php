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
</div>
    <div class="container text-center">  
           <table class="table" style="width: 100%" border="1">
           <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = $_GET['id'];
                $sql = "SELECT detail_penjualan.*, produk.nama_produk FROM detail_penjualan LEFT JOIN produk ON  detail_penjualan.produksi_id=produk.id WHERE penjualan_id = $id ";
                $query = mysqli_query($koneksi, $sql);
                while ($d =  mysqli_fetch_array($query)){
                    ?>
                    <tr>
<td><?= $d['nama_produk'] ?></td>
<td><?= $d['subtotal']?></td>
<td><?= $d['jumlah_produk']?></td>
<td><?= $d['subtotal']* $d['jumlah_produk']?></td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
</table>
        </div>
   
</body>
</html>