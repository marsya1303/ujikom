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
.bton {
                background: #e774c3;
                width: 70px;
                border-radius: 5px;
                color: white;
                height: 35px;
                padding: 6px 10px 15px 10px;
                margin: 3px;
                text-decoration: none;
            }
</style>
<body>

    <div class="daftar">
        <h2>Daftar</h2>
        <form action="" method="POST">
        <table width="100%">
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" class="form-control" placeholder="Username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password" class="form-control" placeholder="Password"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>
					<input type="radio" name="level" value="administrator"> Admin <br>
					<input type="radio" name="level" value="petugas"> Kasir
				</td>
			</tr>
        </table>
        <br>
            <button type="submit" name="submit" class="btn-kirim">Daftar</button>
            <br>
            <br>
			<!-- <a href="index.php" class="btn-batal">Kembali</a> -->
</div>
        </form>
    </div>
    <?php 
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST ['level'];
        $simpan = "INSERT INTO user (username,password,level) VALUES ('$username','$password','$level')";
        $query = mysqli_query($koneksi, $simpan);
        if ($query){
            ?>
            <script type="text/javascript">
            alert('Data Berhasil Disimpan');
            window.location="index.php";
            </script>
        } else {
            echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
            <?php
        }
    }
    ?>
</body>

</html>