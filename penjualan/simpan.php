<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../config/koneksi.php";

$no_faktur      = $_POST['no_faktur'];
$tgl_faktur     = $_POST['tgl_faktur'];
$due_date       = $_POST['due_date'];
$metode_bayar   = $_POST['metode_bayar'];
$ppn            = $_POST['ppn'];
$dp             = $_POST['dp'];
$id_customer    = $_POST['id_customer'];
$id_perusahaan  = $_POST['id_perusahaan'];

$id_produk      = $_POST['id_produk'];
$qty            = $_POST['qty'];

/* Ambil harga produk */
$produk = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT * FROM produk
WHERE id_produk='$id_produk'
"));

$price = $produk['price'];

/* Hitung */
$subtotal    = $price * $qty;
$grand_total = $subtotal + $ppn - $dp;

/* Simpan ke tabel faktur */
mysqli_query($conn,"
INSERT INTO faktur
(
no_faktur,
tgl_faktur,
due_date,
metode_bayar,
ppn,
dp,
grand_total,
user,
id_customer,
id_perusahaan
)
VALUES
(
'$no_faktur',
'$tgl_faktur',
'$due_date',
'$metode_bayar',
'$ppn',
'$dp',
'$grand_total',
'admin',
'$id_customer',
'$id_perusahaan'
)
");

/* Simpan detail faktur */
mysqli_query($conn,"
INSERT INTO detail_faktur
(
id_produk,
no_faktur,
qty,
price
)
VALUES
(
'$id_produk',
'$no_faktur',
'$qty',
'$price'
)
");

header("Location:cetak_faktur.php?id=$no_faktur");
exit;

?>