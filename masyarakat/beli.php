<?php
session_start();
include '../koneksi.php';
?>
<?php
$produk= $_GET['produk'];
$harga= $_GET['harga'];

$detail2 = "SELECT * FROM detail_penjualan WHERE produksi_id = $produk AND penjualan_id = 0";

$query2 = mysqli_query($koneksi, $detail2);
if (mysqli_num_rows($query2) >0){
    $data1 = mysqli_fetch_array($query2);
    $jumlah = $data1['jumlah_produk'];
    $id = $data1['id'];
    $detail3 = "UPDATE detail_penjualan SET jumlah_produk = $jumlah + 1 WHERE id=$id";
    $query3 = mysqli_query($koneksi, $detail3);
    if ($query3){
        echo "<script>alert('Barang Berhasil Ditambahkan');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($koneksi) ."');</script>";
    }
} else {
    $detail = "INSERT INTO detail_penjualan (penjualan_id, produksi_id, jumlah_produk, subtotal) VALUES (0, '$produk', 1, '$harga')";
    $query = mysqli_query($koneksi, $detail);
    
    if ($query){
        ?>
        <script type="text/javascript">;
        alert('Barang Berhasil Ditambahkan');
        window.location="../admin/transaksi.php";
        </script>
        } else {
            echo "<script>alert('Error: " . mysqli_error($koneksi) ."');</script>";
            <?php
        }
}
?>
            