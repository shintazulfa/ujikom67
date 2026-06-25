<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php";

$id=$_POST['id_produk'];

mysqli_query($conn,"
UPDATE produk SET

nama_produk='$_POST[nama_produk]',
price='$_POST[price]',
jenis='$_POST[jenis]'

WHERE id_produk='$id'
");

header("Location:index.php");
exit;

?>