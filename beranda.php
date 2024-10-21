<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Kasir Skaone</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons.css">
</head>
<body>
    <div class="menu">
    <a href="beranda.php" class="navbar-brand"><b>SKAPATISSERIE</b></a>
        <?php 
        $level = $_SESSION['level'] ;
        if ($level === 'administrator') {
        ?>
            <a href="admin/registrasi.php" target="frame">Kelola Data Pengguna</a>
            <a href="admin/pelanggan.php" target="frame">Kelola Data Pelanggan</a>
            <a href="admin/stok_barang.php" target="frame">Kelola Stok Barang</a>
            <a href="admin/pembelian.php" target="frame">Laporan Penjualan</a>
            <a id="logout" href="index.php">Logout <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
</svg></a>
        <?php }
         else if($level === 'petugas'){ ?>
            <a href="admin/pelanggan.php" target="frame">Kelola Data Pelanggan</a>
            <a href="admin/menu.php" target="frame">Menu</a>
            <!-- <a href="admin/transaksi.php" target="frame">Transaksi</a> -->
            <a href="admin/pembelian.php" target="frame">Laporan Penjualan</a>
            <a href="index.php">Logout
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
</svg>
            </a>
         <?php } ?>
    </div>
    <iframe name="frame" frameborder="0" width="100%"
        height="458px">
    </iframe>
    <footer>
        <span>Copyright</span> &copy Kelompok 1, <span
            class="t">2024</span>.
    </footer>
</body>
</html>
    