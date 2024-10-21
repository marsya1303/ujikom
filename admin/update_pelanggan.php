<?php
if(isset($_POST['submit'])){
    $id = $_POST ['id'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST ['nomor_telepon'];
    include "../koneksi.php";
    $sql= "UPDATE pelanggan set nama_pelanggan='$nama_pelanggan', alamat='$alamat', nomor_telepon='$nomor_telepon' WHERE id='$id'";
    $update = mysqli_query($koneksi, $sql);
    if($update){
        ?><script type="text/javascript">
        document.location.href="pelanggan.php";
        
        </script><?php
        echo "<script>alert('Data Berhasil Diedit');</script>";
    } else {
        echo "<script>alert('Data Gagal Diedit');</script>";
    }
}

?>