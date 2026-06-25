<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
error_reporting(E_ALL);
ini_set('display_errors',1);

include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT * FROM perusahaan
WHERE id_perusahaan='$id'
"));

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Edit Perusahaan</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>

<div class="container">

<?php include "../template/sidebar.php"; ?>

<div class="content">

<h2>Edit Data Perusahaan</h2>

<hr><br>

<form method="POST" action="update.php">

<input type="hidden" name="id_perusahaan" value="<?= $data['id_perusahaan']; ?>">

Nama Perusahaan<br>

<input
type="text"
name="nama_perusahaan"
value="<?= $data['nama_perusahaan']; ?>"
required>

<br><br>

Alamat<br>

<textarea name="alamat" style="width:100%;height:80px;" required><?= $data['alamat']; ?></textarea>

<br><br>

No Telepon<br>

<input type="text" name="no_telp" value="<?= $data['no_telp']; ?>" style="width:100%;padding:10px;" required>

<br><br>

Tax<br>

<input type="number" name="tax" value="<?= $data['tax']; ?>" style="width:100%;padding:10px;" required>

<br><br>

<button type="submit">Update</button>

<a href="index.php">Kembali</a>

</form>

</div>

</div>

<?php include "../template/footer.php"; ?>

</body>
</html>