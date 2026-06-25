<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php";

mysqli_query($conn,"
INSERT INTO produk
(nama_produk,price,jenis)
VALUES
(
'$_POST[nama_produk]',
'$_POST[price]',
'$_POST[jenis]'
)
");

header("Location:index.php");
exit;

?>
