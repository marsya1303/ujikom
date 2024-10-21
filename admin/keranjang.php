<?php
include "../koneksi.php"
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container text-right">
            <a href="hapus_keranjang.php" class="btn btn-success btn-sm text-end">Hapus Semua</a>
        <br>
            <table class="table" style="width=100%" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = mysqli_query($koneksi, "SELECT detail_penjualan.*,produk.nama_produk,produk.harga FROM detail_penjualan LEFT JOIN produk ON detail_penjualan.produksi_id=produk.id WHERE penjualan_id=0");
                $no = 1;
                while ($id = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?=$no++ ?>.</td>
                        <td><?=$id['nama_produk']?></td>
                        <td><?=$id['harga']?></td>
                        <td><?=$id['jumlah_produk']?></td>
                        <td><a href="hapus_keranjang.php?id=<?=$id['id']?>" class="btn btn-success btn-sm">Hapus</a></td>
                    </tr>

                <?php } ?>
            </tbody>
</table>
<a href='pembayaran.php' class="btn btn-primary btn-sm">Order</a>
<a href ='menu.php' class="btn btn-primary btn-sm">Kembali</a>
</div>
    </body>
</html>