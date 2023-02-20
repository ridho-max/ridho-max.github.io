<?php
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa  ");

// tombol cari ditekan
if( isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>halaman admin</title>
    <style>
        .loader {
            width: 100px;
            position: absolute;
            top: 125px;
            left: 300px;
            z-index: -2;
            display: none;
        }
    </style>

    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>



    <a href="logout.php">Logout</a>

<h1>daftar mahasiswa</h1>

<a href="tambah.php">Tambah data mahasiswa</a>
<br></br>

<form action="" method="post">

<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian...." autocomplete="off" id="keyword">
<button type="submit" name="cari" id="tombol-cari">cari!</button>

<img src="img/loadergas.gif" class="loader">

</form>



<br>
<div id="container">

<table border="1" cellpadding="10" cellspacing="0">


<tr>
    <th>no.</th>
    <th>aksi</th>
    <th>gambar</th>
    <th>nrp</th>
    <th>nama</th>
    <th>email</th>
    <th>jurusan</th>
</tr>


<?php $i = 1; ?>
<?php foreach( $mahasiswa as $row) : ?>
<tr>
    <td><?= $i ?></td>
    <td>
        <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yang bener?');">hapus</a>
    </td>
    <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
    <td><?= $row["nrp"]?></td>
    <td><?= $row["nama"]?></td>
    <td><?= $row["email"]?></td>
    <td><?= $row["jurusan"]?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>
</div>
 
</body>
</html>