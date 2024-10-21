<?php
include "../koneksi.php";
session_start();
?>
<?php
$totalharga = $_POST['harga'];
$idpelanggan = $_POST['pelanggan'];
$bayar = $_POST['bayar'];
$tanggal = date("Y-m-d");
$penjualan = "INSERT INTO penjualan (tanggal_penjualan, total_harga, pelanggan_id, bayar) VALUES ('$tanggal', '$totalharga', '$idpelanggan', '$bayar')";
$query2 = mysqli_query($koneksi, $penjualan);
if ($bayar < $totalharga){
    echo "<script>alert('Uang Kurang');</script>";
} else {
    if ($query2){
        $last_id = $koneksi->insert_id;
    $detailpenjualan = "UPDATE detail_penjualan set penjualan_id = $last_id WHERE penjualan_id=0";
    
    $query3 = mysqli_query($koneksi, $detailpenjualan);
    if ($query3){
        echo "<script>alert('Orderan berhasil');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
    } 
    } else {
        echo "<script>alert('Orderan gagal');</script>";
    }
}

?>
