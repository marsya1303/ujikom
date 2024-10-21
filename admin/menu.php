<?php
session_start();
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Kasir Skaone</title>
        <link rel="stylesheet" type="text/css" href="./style.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/min/bootstrap.min.js">
        <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
        <style>
        
                
            
            .bton {
                background: #e774c3;
                width: 150px;
                border-radius: 5px;
                color: white;
                height: 80px;
                padding: 6px 10px 9px 10px;
                margin: 10px;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
    <div class="container my-3  ">
    <div class="row"> 
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM produk");
        while ($id = mysqli_fetch_array($query)){ ?>
    <div class = "col-3">
        <div class = "card border p-1 w-100">
            <img src="../menu/<?= $id['foto']?>" class="card-img-top">
            <div class="card-body">
                <h4><?= $id['nama_produk']?></h4>
                <p>Rp. <?= $id['harga']?></p>
                <center>
                    
                    <a class="bton text-light" href='menu.php?produk=<?= $id['id'] ?>&harga=<?= $id['harga'] ?> '>Beli</a>
        </center>
        </div>
        </div>
        </div>
        <?php } ?>
        </div>
        </div>
        <div class="container text-end">
            <a href="keranjang.php" class="btn btn-primary btn-sm">Order
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
  <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
</svg>
            </a>
        <!-- <a href='pembayaran.php' class="btn btn-primary btn-sm">Order</a> -->
        </div>
        
        <?php

if (isset($_GET['produk'])){
    $produk= $_GET['produk'];
$harga= $_GET['harga'];
    $detail2 = "SELECT * FROM detail_penjualan WHERE produksi_id = $produk AND penjualan_id = 0";
    $produkquery = "SELECT * FROM produk WHERE id=$produk";
    $produksql = mysqli_query($koneksi, $produkquery);
    $array = mysqli_fetch_array($produksql);
    $stok = $array[3];

    $query2 = mysqli_query($koneksi, $detail2);
    if (mysqli_num_rows($query2) >0){
        $data1 = mysqli_fetch_array($query2);
        $jumlah = $data1['jumlah_produk'];
        $id = $data1['id'];
        $detail3 = "UPDATE detail_penjualan SET jumlah_produk = $jumlah + 1 WHERE id=$id";
        $query3 = mysqli_query($koneksi, $detail3);
        if ($query3){
            $stokupdate = $stok- 1;
            $query4 = "UPDATE  produk SET stok='$stokupdate'  WHERE id=$produk";
            $sql4 = mysqli_query($koneksi, $query4);
        if ($query4){
            echo "<script>alert('Barang Berhasil Ditambahkan');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($koneksi) ."');</script>";
        }  
        } else {
            echo "<script>alert('Error: " . mysqli_error($koneksi) ."');</script>";
        }
    } else {
        $stokupdate2 = $stok - 1;
        $query5 = "UPDATE  produk SET stok='$stokupdate2' WHERE id=$produk";
        $sql5 = mysqli_query($koneksi, $query5);
        $detail = "INSERT INTO detail_penjualan (penjualan_id, produksi_id, jumlah_produk, subtotal) VALUES (0, '$produk', 1, '$harga')";
        $query = mysqli_query($koneksi, $detail);
        
        if ($query){
            if ($sql5){ ?>
                <script type="text/javascript">;
                alert('Barang Berhasil Ditambahkan');
                window.location="../admin/menu.php";
                </script>
                <?php } else {
                    echo "<script>alert('Error: " .$query5 ."');</script>";
                    
                }
            ?>
           
            <?php } else {
                echo "<script>alert('Error: " . mysqli_error($koneksi) ."');</script>";
                
            }
    }
}

?>
    


    </body>
</html>