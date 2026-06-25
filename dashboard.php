<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/config/koneksi.php";

if (!isset($conn)) {
    die("Variabel \$conn tidak ditemukan. Periksa file config/koneksi.php");
}

if (mysqli_connect_errno()) {
    die("MySQL Error : " . mysqli_connect_error());
}

/* Dashboard */
$q1 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM perusahaan");
$jml_perusahaan = mysqli_fetch_assoc($q1)['total'];

$q2 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM customer");
$jml_customer = mysqli_fetch_assoc($q2)['total'];

$q3 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM produk");
$jml_produk = mysqli_fetch_assoc($q3)['total'];

$q4 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM faktur");
$jml_faktur = mysqli_fetch_assoc($q4)['total'];

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Dashboard</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "template/header.php"; ?>

<?php include "template/navbar.php"; ?>

<div class="container">

<?php include "template/sidebar.php"; ?>

<div class="content">

<h2>Dashboard Administrator</h2>

<hr><br>

<div style="display:flex;flex-wrap:wrap;gap:20px;">

<div style="
flex:1;
min-width:180px;
background:#ffffff;
color:#333;
padding:20px;
border-radius:10px;
box-shadow:0 3px 10px rgba(0,0,0,.15);
text-align:center;
">

<h1>🏢</h1>

<h2><?= $jml_perusahaan; ?></h2>

<p>Total Perusahaan</p>

</div>

<div style="
flex:1;
min-width:180px;
background:#ffffff;
color:#333;
padding:20px;
border-radius:10px;
box-shadow:0 3px 10px rgba(0,0,0,.15);
text-align:center;
">

<h1>👥</h1>

<h2><?= $jml_customer; ?></h2>

<p>Total Customer</p>

</div>

<div style="
flex:1;
min-width:180px;
background:#ffffff;
color:#333;
padding:20px;
border-radius:10px;
box-shadow:0 3px 10px rgba(0,0,0,.15);
text-align:center;
">

<h1>📦</h1>

<h2><?= $jml_produk; ?></h2>

<p>Total Produk</p>

</div>

<div style="
flex:1;
min-width:180px;
background:#ffffff;
color:#333;
padding:20px;
border-radius:10px;
box-shadow:0 3px 10px rgba(0,0,0,.15);
text-align:center;
">

<h1>🧾</h1>

<h2><?= $jml_faktur; ?></h2>

<p>Total Faktur</p>

</div>

</div>

<br>

<div style="
background:#ffffff;
color:#333;
padding:25px;
border-radius:10px;
box-shadow:0 3px 10px rgba(0,0,0,.15);
line-height:28px;
">

<h3>👋 Selamat Datang Administrator</h3>

<p>

Selamat datang di <b>Sistem Informasi Penjualan</b>.
Silakan gunakan menu di sebelah kiri untuk mengelola data <b>Perusahaan</b>,
<b>Customer</b>, <b>Produk</b>, serta melakukan <b>Transaksi Penjualan</b>
dan mencetak <b>Faktur Penjualan</b>.

</p>

<hr>

<table width="100%" cellspacing="10">

<tr>

<td width="50%">

<b>📊 Ringkasan Data</b>

<ul>

<li>Total Perusahaan : <b><?= $jml_perusahaan; ?></b></li>

<li>Total Customer : <b><?= $jml_customer; ?></b></li>

<li>Total Produk : <b><?= $jml_produk; ?></b></li>

<li>Total Faktur : <b><?= $jml_faktur; ?></b></li>

</ul>

</td>

<td>

<b>📌 Menu yang Tersedia</b>

<ul>

<li>Kelola Data Perusahaan</li>

<li>Kelola Data Customer</li>

<li>Kelola Data Produk</li>

<li>Transaksi Penjualan</li>

<li>Cetak Faktur</li>

</ul>

</td>

</tr>

</table>

</div>

</div>

</div>

<?php include "template/footer.php"; ?>

</body>

</html>