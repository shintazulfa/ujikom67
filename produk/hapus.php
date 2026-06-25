<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php";

$id=$_GET['id'];

mysqli_query($conn,"
DELETE FROM produk
WHERE id_produk='$id'
");

header("Location:index.php");
exit;

?>
