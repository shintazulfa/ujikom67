<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
error_reporting(E_ALL);
ini_set('display_errors',1);

include "../config/koneksi.php";

$data = mysqli_query($conn,"
SELECT
f.no_faktur,
f.tgl_faktur,
c.nama_customer,
f.grand_total
FROM faktur f
JOIN customer c ON f.id_customer=c.id_customer
ORDER BY f.tgl_faktur DESC
");

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Data Penjualan</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>

<div class="container">

<?php include "../template/sidebar.php"; ?>

<div class="content">

<h2>DATA PENJUALAN</h2>

<hr><br>

<a href="tambah.php"
style="background:green;color:white;padding:10px 15px;border-radius:5px;text-decoration:none;">
+ Tambah Penjualan
</a>

<br><br>

<table border="1" width="100%" cellpadding="10" cellspacing="0" style="background:white;color:black;">

<tr style="background:#4a73c9;color:white;">

<th>No Faktur</th>
<th>Tanggal</th>
<th>Customer</th>
<th>Grand Total</th>
<th>Aksi</th>

</tr>

<?php while($d=mysqli_fetch_assoc($data)){ ?>

<tr>

<td><?= $d['no_faktur']; ?></td>
<td><?= $d['tgl_faktur']; ?></td>
<td><?= $d['nama_customer']; ?></td>
<td>Rp <?= number_format($d['grand_total']); ?></td>

<td>

<a href="cetak_faktur.php?id=<?= $d['no_faktur']; ?>">
Cetak
</a>

|

<a href="hapus.php?id=<?= $d['no_faktur']; ?>"
onclick="return confirm('Hapus Data?')">

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
