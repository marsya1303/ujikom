<?php
include "../koneksi.php"
?>
 <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM pelanggan WHERE id='$id'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_array($result);
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
<form action="update_pelanggan.php" method="POST">
           <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">


				<div class="card border mt-3 w-50">
					<div class="card-header">
						<h3>Data Pelanggan</h3>
					</div>
					<div class="card-body">
						<table width="100%">
                    <tr>
						<td>Nama Pelanggan</td>
						<td><input type="text" name="nama_pelanggan" class="form-control" value="<?= $row['nama_pelanggan'] ?>"></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><input type="text" name="alamat" class="form-control" value="<?= $row['alamat'] ?>"></td>
					</tr>
					<tr>
						<td>No telepon</td>
						<td><input type="text" name="nomor_telepon" class="form-control" value="<?= $row['nomor_telepon'] ?>"></td>
	     			</tr>
						</div>
</table>
					</div>
				<div class="card-footer text-end">
                    <button type="submit" name="submit" value="update"  class="btn btn-primary btn-sm">Edit</button>
					<a href="pelanggan.php" class="btn btn-danger btn-sm">Batal</a>
				</div>
			</form>
		</center>
	</div>
   </body>

</html>