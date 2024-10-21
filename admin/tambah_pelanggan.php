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
						<h3>Tambah Pelanggan</h3>
					</div>
					<div class="card-body">
						<table width="100%">
							<tr>
								<td>Nama Pelanggan</td>
								<td><input type="text" name="nama_pelanggan" class="form-control"></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><input type="textarea" name="alamat" class="form-control"></td>
							</tr>
							<tr>
								<td>No telepon</td>
								<td><input type="number" name="nomor_telepon" class="form-control"></td>
							</tr>
						</table>
                     </div>
				    <div class="card-footer text-end">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah</button>
					<a href="pelanggan.php" class="btn btn-danger btn-sm">Batal</a>
				</div>
             </div>	
			</form>
		</center>
	</div>
    <?php 
    if (isset($_POST['submit'])) {
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $no = $_POST ['nomor_telepon'];
        $simpan = "INSERT INTO pelanggan (nama_pelanggan,alamat,nomor_telepon) VALUES ('$nama_pelanggan','$alamat','$no')";
        $query = mysqli_query($koneksi, $simpan);
        if ($query){
            ?>
            <script type="text/javascript">;
            alert('Data Berhasil Disimpan');
            window.location="pelanggan.php";
            </script>
        } else {
            echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
            <?php
        }
    }
    ?>
</body>

</html>