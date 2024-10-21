<?php
$koneksi= mysqli_connect("localhost","root","","ujikom");
if(isset($_POST["submit"]));
{
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $level = $_POST['level'];
    $query="INSERT INTO `user` ( `username`, `password`, `level`) VALUES ('$username', '$password', '$level')";
    $sql=mysqli_query($koneksi, $query);
    if ($sql){
        ?>
        <script type="text/javascript">alert('Data Berhasil Disimpan');
        window.location="index.php";
        else {
            echo <script>alert('Data Gagal Disimpan')</script>;
        }
        </script>
        <?php
    }
} 
?>