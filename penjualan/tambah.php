<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php";

$customer=mysqli_query($conn,"SELECT * FROM customer");
$perusahaan=mysqli_query($conn,"SELECT * FROM perusahaan");
$produk=mysqli_query($conn,"SELECT * FROM produk");

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Tambah Penjualan</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>

<div class="container">

<?php include "../template/sidebar.php"; ?>

<div class="content">

<h2>Tambah Penjualan</h2>

<form method="POST" action="simpan.php">

No Faktur<br>
<input type="text" name="no_faktur" required><br><br>

Tanggal Faktur<br>
<input type="date" name="tgl_faktur" required><br><br>

Due Date<br>
<input type="date" name="due_date" required><br><br>

Metode Bayar<br>

<select name="metode_bayar">

<option value="Cash">Cash</option>
<option value="Transfer">Transfer</option>

</select>

<br><br>

Customer<br>

<select name="id_customer">

<?php while($c=mysqli_fetch_assoc($customer)){ ?>

<option value="<?= $c['id_customer']; ?>">
<?= $c['nama_customer']; ?>
</option>

<?php } ?>

</select>

<br><br>

Perusahaan<br>

<select name="id_perusahaan">

<?php while($p=mysqli_fetch_assoc($perusahaan)){ ?>

<option value="<?= $p['id_perusahaan']; ?>">
<?= $p['alamat']; ?>
</option>

<?php } ?>

</select>

<br><br>

Produk<br>

<select name="id_produk">

<?php while($b=mysqli_fetch_assoc($produk)){ ?>

<option value="<?= $b['id_produk']; ?>">
<?= $b['nama_produk']; ?>
</option>

<?php } ?>

</select>

<br><br>

Qty<br>
<input type="number" name="qty" required><br><br>

PPN<br>
<input type="number" name="ppn" required><br><br>

DP<br>
<input type="number" name="dp" required><br><br>

<button type="submit">Simpan</button>

</form>

</div>

</div>

<?php include "../template/footer.php"; ?>

</body>
</html>
