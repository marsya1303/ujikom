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
<?php
    $query = "SELECT * FROM detail_penjualan WHERE penjualan_id = 0";
    $result = mysqli_query($koneksi, $query);
    $harga = 0;
    $barang = [];
    while ($id = mysqli_fetch_array($result)){
    $barang[] = $id['jumlah_produk'] * $id['subtotal'] ;
    };
    for ($x = 0; $x < sizeof($barang); $x++){
        $harga += $barang[$x];
    }
    ?>
	<div class="container">
		<center>
			<form method="POST" action="../masyarakat/order.php">
				<div class="card border mt-3 w-50">
					<div class="card-header">
						<h3>Pembayaran</h3>
					</div>
					<div class="card-body">
						<table width="100%">
                        <tr>
                        <td>Total Harga </td>
                        <td><input type="text" name="harga" value="<?= $harga ?>"readonly class="form-control"></td>
                        </tr>
                        <tr>
                        <td> Pelanggan </td>
                        <td><select name="pelanggan" class="form-control">
                         <?php
                        $query2 = "SELECT * FROM pelanggan";
                        $result2 = mysqli_query($koneksi, $query2);
                        while ($id2 = mysqli_fetch_array($result2)){
                        ?>
                        <option value="<?= $id2['id'] ?>"> <?= $id2['nama_pelanggan'] ?> </option>
                        <?php
                        }
                        ?>
                        </select></td>
                        </tr>
                        <tr>
                        <td> Bayar </td>
                        <td><input type="text" name="bayar" class="form-control"></td>
                        </tr>
						</table>
                     </div>
				    <div class="card-footer text-end">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Bayar</button>
					<a href="menu.php" class="btn btn-danger btn-sm">Batal</a>
				</div>
             </div>	
			</form>
		</center>
	</div>
</body>

</html>