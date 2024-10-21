<?php
include "../koneksi.php"
?>  
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM produk WHERE id='$id'";
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
<form action="update_barang.php" method="POST">
           <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">


				<div class="card border mt-3 w-50">
					<div class="card-header">
						<h3>Data Produk</h3>
					</div>
					<div class="card-body">
						<table width="100%">
                    <tr>
                    <td>Nama Produk</td>
                    <td><input type="text" name="nama_produk" class="form-control" value="<?= $row['nama_produk'] ?>"></td>
                    </tr>
                    <tr>
                    <td>Harga</td>
                    <td><input type="number" name="harga" class="form-control" value="<?= $row['harga'] ?>"></td>
                    </tr>
                    <tr>
                    <td>Stok </td>
                    <td><input type="number" name="stok" class="form-control" value="<?= $row['stok'] ?>"></td>
                    </tr> 
                    <td>Foto </td>
                    <td><input type="file" name="foto" class="form-control" value="<?= $row['stok'] ?>"></td>
                    </tr> 
						</div>
</table>
					</div>
				<div class="card-footer text-end">
                    <button type="submit" name="submit" value="update"  class="btn btn-primary btn-sm">Edit</button>
					<a href="stok_barang.php" class="btn btn-danger btn-sm">Batal</a>
				</div>
			</form>
		</center>
	</div>
   </body>

</html>