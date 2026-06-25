<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
error_reporting(E_ALL);
ini_set('display_errors',1);

include "../config/koneksi.php";

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Tambah Perusahaan</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>

<div class="container">

<?php include "../template/sidebar.php"; ?>

<div class="content">

<h2>Tambah Data Perusahaan</h2>

<hr><br>

<form method="POST" action="simpan.php">

Nama Perusahaan<br>

<input type="text"
name="nama_perusahaan"
required>

<br><br>

Alamat<br>

<textarea name="alamat" required
style="width:100%;height:80px;"></textarea>

<br><br>

No Telepon<br>

<input type="text"
name="no_telp"
required
style="width:100%;padding:10px;">

<br><br>

Tax<br>

<input type="number"
name="tax"
required
style="width:100%;padding:10px;">

<br><br>

<button
type="submit"
style="background:green;color:white;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;">

Simpan

</button>

<a href="index.php"
style="background:red;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;margin-left:10px;">

Kembali

</a>

</form>

</div>

</div>

<?php include "../template/footer.php"; ?>

</body>

</html>