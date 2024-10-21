<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include "../koneksi.php";
    $sqld = "delete from user where id='$id'";
    $hapus = mysqli_query($koneksi, $sqld);
    if ($hapus) {
        echo "<script> alert ('Data Berhasil Di Hapus')</script>";
    } else {
        echo "<script> alert ('Data Gagal Di Hapus')</script>";
    }
}
?>
<meta http-equiv="refresh" content="0;url=registrasiadmin.php">