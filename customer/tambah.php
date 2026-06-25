<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tambah Customer</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>

<div class="container">

<?php include "../template/sidebar.php"; ?>

<div class="content">

<h2>Tambah Customer</h2>

<form method="POST" action="simpan.php">

Nama Customer<br>
<input type="text" name="nama_customer" required><br><br>

Perusahaan Customer<br>
<input type="text" name="perusahaan_cust" required><br><br>

Alamat<br>
<textarea name="alamat" required></textarea><br><br>

<button type="submit">Simpan</button>

</form>

</div>

</div>

<?php include "../template/footer.php"; ?>

</body>
</html>
