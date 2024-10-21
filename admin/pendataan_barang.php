<?php
include "../koneksi.php"
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<center>
			<form method="POST" action="">
				<div class="card border mt-3 w-50">
					<div class="card-header">
						<h3>Tambah Produk</h3>
					</div>
					<div class="card-body">
						<table width="100%">
						<tr>
                        	<td>Nama Produk</td>
                        	<td><input type="text" name="nama_produk" class="form-control"></td>
                    	</tr>
                    	<tr>
                        	<td>Harga</td>
                        	<td><input type="number" name="harga" class="form-control"></td>
                    	</tr>
                    	<tr>
                        	<td>Stok</td>
                        	<td><input type="number" name="stok" class="form-control"></td>
                    	</tr>
                    	<tr>
                        	<td>Foto </td>
                        	<td><input type="file" name="foto" class="form-control"></td>
                    	</tr>
						</div>
					</table>
                </div>
				    <div class="card-footer text-end">
                    <button type="submit" name="submit" value="upload" class="btn btn-primary btn-sm">Tambah Barang</button>
					<a href="stok_barang.php" class="btn btn-danger btn-sm">Kembali</a>
				</div>
             </div>	
			</form>
		</center>
	</div>
    <?php 
    if (isset($_POST['submit'])) {
			$nama_produk = $_POST['nama_produk'];
			$harga = $_POST['harga'];
			$stok = $_POST ['stok'];
			$foto = $_POST ['foto'];
			$produk = "INSERT INTO produk (nama_produk,harga,stok,foto) VALUES ('$nama_produk','$harga','$stok','$foto')";
			$query = mysqli_query($koneksi, $produk);
        if ($query){
            ?>
            <script type="text/javascript">;
            alert('Data Berhasil Disimpan');
            window.location="stok_barang.php";
            </script>
        } else {
            echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
            <?php
        }
    }
    ?>
</body>

</html>