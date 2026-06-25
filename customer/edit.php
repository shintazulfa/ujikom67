<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php";

$id=$_GET['id'];

$data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM customer WHERE id_customer='$id'"));

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Customer</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>

<div class="container">

<?php include "../template/sidebar.php"; ?>

<div class="content">

<h2>Edit Customer</h2>

<form method="POST" action="update.php">

<input type="hidden" name="id" value="<?= $data['id_customer']; ?>">

Nama Customer<br>
<input type="text" name="nama_customer" value="<?= $data['nama_customer']; ?>"><br><br>

Perusahaan Customer<br>
<input type="text" name="perusahaan_cust" value="<?= $data['perusahaan_cust']; ?>"><br><br>

Alamat<br>
<textarea name="alamat"><?= $data['alamat']; ?></textarea><br><br>

<button type="submit">Update</button>

</form>

</div>

</div>

<?php include "../template/footer.php"; ?>

</body>
</html>
