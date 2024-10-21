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
<div class="container text-right">
<a href="tambahuser.php" class="btn btn-primary btn-sm text-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
  <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
</svg> Tambah Akun </a>
</div><br>
        <div class="container text-center">  
            <table class="table table-striped table-hover" style="width: 100%" border="1">
                <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Aksi</th>
        </tr>
        </thead>
        <?php 
        $query= mysqli_query($koneksi, "SELECT * FROM user");
        $no = 1;
        while ($id = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td> <?= $no++ ?></td>
            <td> <?= $id['username'] ?></td>
            <td> <?= $id['password'] ?></td>
            <td> <?= $id['level'] ?></td>
            <td><a href='edituser.php?id=<?= $id['id'] ?>' class="btn btn-outline-success btn-sm">Edit</a> 
            <a href='deleteregistrasi.php?id=<?= $id['id'] ?>' class="btn btn-outline-danger btn-sm">Delete</a></td>
        </tr>
        <?php } ?>
            </table>
        </div>
</body>
</html>
    