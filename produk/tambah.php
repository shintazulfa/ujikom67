<?php 
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tambah Produk</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>

<div class="container">

<?php include "../template/sidebar.php"; ?>

<div class="content">

<h2>Tambah Produk</h2>

<form method="POST" action="simpan.php">

Nama Produk<br>
<input type="text" name="nama_produk" required><br><br>

Harga<br>
<input type="number" name="price" required><br><br>

Jenis<br>
<input type="text" name="jenis" required><br><br>

<button type="submit">
Simpan
</button>

</form>

</div>

</div>

<?php include "../template/footer.php"; ?>

</body>
</html>