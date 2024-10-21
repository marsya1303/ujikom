<?php
session_start();
include "../koneksi.php";
?>
<html>
    <head>
<style>
    hr {
  border-style: dashed;
}
td {
    text-align : center;
}
/* Global settings */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    padding: 20px;
    text-align: center;
}

.receipt {
    width: 78mm;
    margin: 0 auto;
    padding: 2mm;
}

.store-info h2 {
    text-align: center;
    font-size: 18px;
    margin: 0;
}

.store-info p {
    text-align: center;
    margin: 5px 0;
    font-size: 10px;
}

.transaction-info {
    margin-top: 20px;
}

.transaction-info p {
    font-size: 14px;
    margin: 5px 0;
}

.item-list {
    width: 100%;
    margin-top: 20px;
}

.item-list th, .item-list td {
    padding: 5px;
    font-size: 14px;
    text-align: left;
}

.item-list th {
    background-color: #f0f0f0;
    font-weight: bold;
}

.total {
    text-align: right;
    margin-top: 10px;
    font-size: 10px;
    font-weight: bold;
}

.footer {
    text-align: center;
    margin-top: 20px;
}

.footer p {
    font-size: 12px;
    color: #888;
}

</style>
    </head>
    <body>
        <div class="receipt">
            <div class="store-info">
    <h1 style="text-align : center">SKAPATISSERIE</h1>
    <h3 style="text-align : center">Jl. Siliwangi No. 30 Kadipaten</h3>
</div>
    <hr>
    <?php
$id = $_GET['id'];
$sql1 = "SELECT * FROM  penjualan WHERE id=$id";
$query1 = mysqli_query($koneksi, $sql1);
$data = mysqli_fetch_array($query1);
    ?>
    <p style="text-align: left !important">Kasir : <?= $_SESSION['username'] ?></p>
    <p style="text-align: left !important">Tanggal : <?= $data[1]?></p>
    <hr>
    <table class="item-list" width="100%">
        <tr>
            <th style="text-align : left !important">Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
        <?php
        $totalbayar = 0;
        $sql = "SELECT detail_penjualan.*, produk.nama_produk FROM detail_penjualan LEFT JOIN produk ON detail_penjualan.produksi_id=produk.id WHERE penjualan_id = $id" ;
        
        $query = mysqli_query($koneksi, $sql);
        while ($d = mysqli_fetch_array($query)){
?>
<tr>
    <td style="text-align : left !important"><?= $d['nama_produk']?>
    </td>
    <td><?= $d['jumlah_produk']?></td>
    <td><?= $d['subtotal']?></td>
    <td><?= $d['subtotal'] * $d['jumlah_produk']?></td>
    <?php
    $totalbayar +=$d['subtotal'] * $d['jumlah_produk'];
    ?>
</tr>
<?php
        } 
        ?>
       
    </table>
    <hr>
    <div class="total">
    <table width="100%">
        <tr>
            <td style="text-align : left !important">Total Bayar</td>
            <td style="text-align : right !important"><?php echo $totalbayar ?></td>
        </tr>
        <tr>
            <td style="text-align : left !important">Bayar</td>
            <td style="text-align : right !important"><?php echo $data[4] ?></td>
        </tr>
        <tr>
            <td style="text-align : left !important">Kembalian</td>
            <td style="text-align : right !important"><?php echo $data[4]-$totalbayar ?></td>
        </tr>
    </table>
    </div>
        <hr>
        <div class="footer"></div>
        <p style="text-align : center">Terimakasih Sudah Berbelanja disini !</p>
        <br><br> 
    </div>
    </div>
    </div>
    </body>
<script> window.print(); </script>
</html>
