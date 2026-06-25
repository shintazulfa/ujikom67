<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
error_reporting(E_ALL);
ini_set('display_errors',1);

include "../config/koneksi.php";

$data = mysqli_query($conn,"SELECT * FROM perusahaan ORDER BY id_perusahaan DESC");

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Data Perusahaan</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<?php include "../template/header.php"; ?>

<?php include "../template/navbar.php"; ?>

<div class="container">

<?php include "../template/sidebar.php"; ?>

<div class="content">

<h2>DATA PERUSAHAAN</h2>

<hr><br>

<a href="tambah.php"
style="
background:green;
color:white;
padding:10px 15px;
text-decoration:none;
border-radius:5px;
font-weight:bold;
">
+ Tambah Data
</a>

<br><br>

<table border="1"
width="100%"
cellpadding="10"
cellspacing="0"
style="background:white;color:black;">

<tr style="background:#4a73c9;color:white;">

<th width="50">No</th>

<th>Nama Perusahaan</th>

<th>Alamat</th>

<th>No Telepon</th>

<th>Tax</th>

<th width="180">Aksi</th>

</tr>

<?php

$no=1;

while($d=mysqli_fetch_assoc($data)){

?>

<tr>

<td align="center"><?= $no++; ?></td>

<td><?= $d['nama_perusahaan']; ?></td>

<td><?= $d['alamat']; ?></td>

<td><?= $d['no_telp']; ?></td>

<td><?= $d['tax']; ?></td>

<td align="center">

<a href="edit.php?id=<?= $d['id_perusahaan']; ?>"
style="
background:orange;
color:white;
padding:6px 10px;
text-decoration:none;
border-radius:4px;
">
Edit
</a>

&nbsp;

<a href="hapus.php?id=<?= $d['id_perusahaan']; ?>"
onclick="return confirm('Yakin ingin menghapus data ini?')"
style="
background:red;
color:white;
padding:6px 10px;
text-decoration:none;
border-radius:4px;
">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

<?php include "../template/footer.php"; ?>

</body>

</html>