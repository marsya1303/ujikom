<?php
include "../koneksi.php"
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<center>
			<form method="POST" action="">


				<div class="card border mt-3 w-50">
					<div class="card-header">
						<h3>Data Pengguna</h3>
					</div>
					<div class="card-body">
						<table width="100%">
							<tr>
								<td>Username</td>
								<td><input type="text" name="username" class="form-control"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="text" name="password" class="form-control"></td>
							</tr>
							<tr>
								<td>Level</td>
								<td>
									<input type="radio" name="level" value="administrator"> Admin <br>
									<input type="radio" name="level" value="petugas"> Kasir
								</td>
							</tr>
						</div>
</table>
					</div>
				<div class="card-footer text-end">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Daftar</button>
					<a href="registrasi.php" class="btn btn-danger btn-sm">Batal</a>
				</div>
			</form>
		</center>
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
            window.location="registrasi.php";
            </script>
        } else {
            echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
            <?php
        }
    }
    ?>
</body>

</html>