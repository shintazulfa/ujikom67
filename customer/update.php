<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php";

$id=$_POST['id'];

mysqli_query($conn,"
UPDATE customer SET
nama_customer='$_POST[nama_customer]',
perusahaan_cust='$_POST[perusahaan_cust]',
alamat='$_POST[alamat]'
WHERE id_customer='$id'
");

header("Location:index.php");
exit;

?>
