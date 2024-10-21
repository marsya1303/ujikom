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
</head>
<style>
    body {
  background: url(index.jpg) center center no-repeat;
}

</style>
<body>

    <div class="login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username"><br>
            <input type="password" name="pass" placeholder="Password"><br>
            <div class="login-form">
            <button class="btn-kirim" type="submit" name="submit">Masuk</button>
</div>
            Belum punya akun?<a href="daftar.php"> Daftar Dahulu</a>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $data_user = mysqli_query($koneksi, "SELECT * FROM 
user WHERE username = '$user' AND password = '$pass'");
            $r = mysqli_fetch_array($data_user);
            $username = $r['username'];
            $password = $r['password'];
            $level = $r['level'];
            $id = $r ['id'];
            if ($user == $username && $pass == $password) {
                $_SESSION['level'] = $level;
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                header("Location: beranda.php");
            } else {
                echo "<script>alert('Username atau Password Anda Salah');</script>";
                header("Location: index.php");

            }
        }
        ?>
    </div>
    <!-- <meta http-equiv="refresh" content="0;url=index.php"> -->
    
</body>

</html>