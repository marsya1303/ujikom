<?php
session_start();
include '../koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Kasir Skaone</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container text-center">  
           <table class="table" style="width: 100%" border="1">
            <thead>
           <tr>
                    <th>Id</th>
                    <th>Nama produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
        </tr>
        </thead>
        <?php
        $query= mysqli_query($koneksi, "SELECT * FROM produk");
        while ($id = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td> <?= $id['id'] ?></td>
                <td> <?= $id['nama_produk'] ?></td>
                <td> <?= $id['harga'] ?></td>
                <td> <?= $id['stok'] ?></td>
                <td><a href='../dua/stok_barangedit.php?id=<?= $id['id'] ?>'>Edit</a> | <a href='../dua/delete.php?id=$id[id]'>Delete</a></td>
        </tr>
            <?php } ?>
        </table>
        </div>
    <div class="container text-center">  
            <!-- <iframe style="width: 100%" src="http://localhost/kasir/registrasi.php"></iframe> -->
        </div>
   
</body>
<script>
    // document.getElementbyId("logout").onclick=function() {<?php  ?>};

</script>
</html>
    