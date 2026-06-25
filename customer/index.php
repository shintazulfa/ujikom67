<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
error_reporting(E_ALL);
ini_set('display_errors',1);

include "../config/koneksi.php";

$data = mysqli_query($conn,"SELECT * FROM customer");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Data Customer</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>

<div class="container">

<?php include "../template/sidebar.php"; ?>

<div class="content">

<h2>DATA CUSTOMER</h2>
<hr><br>

<a href="tambah.php" style="background:green;color:white;padding:10px 15px;text-decoration:none;border-radius:5px;">
+ Tambah Data
</a>

<br><br>

<table border="1" width="100%" cellpadding="10" cellspacing="0" style="background:white;color:black;">

<tr style="background:#4a73c9;color:white;">
<th>No</th>
<th>Nama Customer</th>
<th>Perusahaan</th>
<th>Alamat</th>
<th>Aksi</th>
</tr>

<?php
$no=1;
while($d=mysqli_fetch_assoc($data)){
?>

<tr>
<td><?= $no++; ?></td>
<td><?= $d['nama_customer']; ?></td>
<td><?= $d['perusahaan_cust']; ?></td>
<td><?= $d['alamat']; ?></td>

<td>
<a href="edit.php?id=<?= $d['id_customer']; ?>">Edit</a> |
<a href="hapus.php?id=<?= $d['id_customer']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
</td>

</tr>

<?php } ?>

</table>

<br>

<a href="cetak.php" target="_blank">
Preview / Cetak Customer
</a>

</div>

</div>

<?php include "../template/footer.php"; ?>

</body>
</html>
