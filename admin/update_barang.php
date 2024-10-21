<?php
if(isset($_POST['submit'])){
    $id = $_POST ['id'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST ['stok'];
    $foto = $_POST ['foto'];
    include "../koneksi.php";
    $sql= "UPDATE produk set nama_produk='$nama_produk', harga='$harga', stok='$stok', foto='$foto' WHERE id='$id'";
    $update =mysqli_query($koneksi, $sql);
    if($update){
        ?><script type="text/javascript">
        document.location.href="../admin/stok_barangadmin.php";
        
        </script><?php
        echo "<script>alert('Data Berhasil Diedit');</script>";
    } else {
        echo "<script>alert('Data Gagal Diedit');</script>";
    }
}

?>