<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php";

$nama=$_POST['nama_customer'];
$perusahaan=$_POST['perusahaan_cust'];
$alamat=$_POST['alamat'];

mysqli_query($conn,"
INSERT INTO customer
(nama_customer,perusahaan_cust,alamat)
VALUES
('$nama','$perusahaan','$alamat')
");

header("Location:index.php");
exit;

?>
