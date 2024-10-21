<?php
if(isset($_POST['submit'])){
    $id = $_POST ['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST ['level'];
    include "../koneksi.php";
    $sql= "UPDATE user set username='$username', password='$password', level='$level' WHERE id='$id'";
    $update = mysqli_query($koneksi, $sql);
    if($update){
        ?><script type="text/javascript">
        document.location.href="registrasi.php";
        
        </script><?php
        echo "<script>alert('Data Berhasil Diedit');</script>";
    } else {
        echo "<script>alert('Data Gagal Diedit');</script>";
    }
}

?>