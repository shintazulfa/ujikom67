<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT * FROM produk
WHERE id_produk='$id'
"));

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Produk</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>

<div class="container">

<?php include "../template/sidebar.php"; ?>

<div class="content">

<h2>Edit Produk</h2>

<form method="POST" action="update.php">

<input type="hidden" name="id_produk" value="<?= $data['id_produk']; ?>">

Nama Produk<br>
<input type="text" name="nama_produk"
value="<?= $data['nama_produk']; ?>" required>

<br><br>

Harga<br>

<input type="number" name="price"
value="<?= $data['price']; ?>" required>

<br><br>

Jenis<br>

<input type="text" name="jenis"
value="<?= $data['jenis']; ?>" required>

<br><br>

<button type="submit">
Update
</button>

</form>

</div>

</div>

<?php include "../template/footer.php"; ?>

</body>
</html>