<?php
include "../koneksi.php"
?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_array($result);
    $level = $row['level'];
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
<form action="update_user.php" method="POST">
           <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">


				<div class="card border mt-3 w-50">
					<div class="card-header">
						<h3>Data Pengguna</h3>
					</div>
					<div class="card-body">
						<table width="100%">
							<tr>
								<td>Username</td>
								<td><input type="text" name="username" class="form-control" value="<?= $row['username'] ?>"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="text" name="password" class="form-control" value="<?= $row['password'] ?>"></td>
							</tr>
							<tr>
								<td>Level</td>
								<td>
									<input type="radio" name="level" value="administrator" <?php if ($level == 'administrator'){
                                                                                    echo 'checked';
                                                                                } ?>> Admin <br>
						<input type="radio" name="level" value="petugas" <?php if ($level == 'petugas'){
                                                                                    echo 'checked';
                                                                                } ?>> Kasir
								</td>
							</tr>
						</div>
</table>
					</div>
				<div class="card-footer text-end">
                    <button type="submit" name="submit" value="update"  class="btn btn-primary btn-sm">Edit</button>
					<a href="registrasi.php" class="btn btn-danger btn-sm">Batal</a>
				</div>
			</form>
		</center>
	</div>
   </body>

</html>