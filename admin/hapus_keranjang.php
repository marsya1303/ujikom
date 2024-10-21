<?php
include "../koneksi.php";

if (isset($_GET['id'])){
    $id = $_GET ['id'];
    $sqld = "DELETE FROM detail_penjualan WHERE id='$id'";
    $hapus = mysqli_query($koneksi, $sqld);
    if ($hapus){
        echo "<script> alert ('Barang Dihapus dari Keranjang')</script>";
    } else {
        echo "<script> alert ('Gagal Membatalkan Barang dari Keranjang')</script>";
    }
} else {
    $delete = "DELETE FROM detail_penjualan";
    $result = mysqli_query($koneksi, $delete);
    if ($result){
        echo "<script> alert ('Semua Barang Berhasil Dihapus')</script>";
    } else {
        echo "<script> alert ('Gagal Hapus Barang Dari Keranjang')</script>";
    }
        
    
}
?>
<meta http-equiv="refresh" content="0;url=keranjang.php">