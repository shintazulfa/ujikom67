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
SELECT
f.*,
c.nama_customer,
c.alamat AS alamat_customer,
p.alamat AS alamat_perusahaan,
p.no_telp,
p.tax,
d.qty,
d.price,
pr.nama_produk
FROM faktur f
JOIN customer c ON f.id_customer=c.id_customer
JOIN perusahaan p ON f.id_perusahaan=p.id_perusahaan
JOIN detail_faktur d ON f.no_faktur=d.no_faktur
JOIN produk pr ON d.id_produk=pr.id_produk
WHERE f.no_faktur='$id'
"));

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Cetak Faktur</title>

<style>

body{
    font-family:Arial, Helvetica, sans-serif;
    margin:35px;
    color:#000;
    font-size:14px;
}

.judul{
    text-align:center;
    margin-bottom:15px;
}

.judul h2{
    margin:0;
    letter-spacing:2px;
}

hr{
    border:1px solid #000;
}

.header{
    width:100%;
    margin-top:20px;
    overflow:hidden;
}

.kiri{
    width:50%;
    float:left;
}

.kanan{
    width:45%;
    float:right;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

table,th,td{
    border:1px solid #000;
}

th{
    background:#efefef;
}

th,td{
    padding:8px;
}

.summary{
    width:35%;
    float:right;
    margin-top:15px;
}

.summary td{
    padding:6px;
}

.ttd{
    margin-top:90px;
    width:250px;
    float:right;
    text-align:center;
}

.clear{
    clear:both;
}

button{
    margin-top:30px;
    padding:10px 20px;
    cursor:pointer;
}

@media print{

button{
display:none;
}

}

</style>

</head>

<body>

<div class="judul">

<h2>FAKTUR PENJUALAN</h2>

</div>

<hr>

<div class="header">

<div class="kiri">

<b>DATA PERUSAHAAN</b>

<br><br>

Alamat :
<br>

<?= $data['alamat_perusahaan']; ?>

<br><br>

No Telp :
<br>

<?= $data['no_telp']; ?>

<br><br>

Tax :
<br>

<?= $data['tax']; ?>

</div>

<div class="kanan">

<table border="0" style="border:none;">

<tr style="border:none;">
<td style="border:none;">No Faktur</td>
<td style="border:none;">:</td>
<td style="border:none;"><?= $data['no_faktur']; ?></td>
</tr>

<tr>
<td style="border:none;">Tanggal</td>
<td style="border:none;">:</td>
<td style="border:none;"><?= $data['tgl_faktur']; ?></td>
</tr>

<tr>
<td style="border:none;">Due Date</td>
<td style="border:none;">:</td>
<td style="border:none;"><?= $data['due_date']; ?></td>
</tr>

<tr>
<td style="border:none;">Pembayaran</td>
<td style="border:none;">:</td>
<td style="border:none;"><?= $data['metode_bayar']; ?></td>
</tr>

</table>

</div>

</div>

<div class="clear"></div>

<hr>

<b>DATA CUSTOMER</b>

<br><br>

Nama Customer :

<b><?= $data['nama_customer']; ?></b>

<br>

Alamat :

<?= $data['alamat_customer']; ?>

<table>

<tr>

<th width="50">No</th>

<th>Nama Produk</th>

<th width="80">Qty</th>

<th width="150">Harga</th>

<th width="180">Subtotal</th>

</tr>

<tr>

<td align="center">1</td>

<td><?= $data['nama_produk']; ?></td>

<td align="center"><?= $data['qty']; ?></td>

<td align="right">
Rp <?= number_format($data['price']); ?>
</td>

<td align="right">
Rp <?= number_format($data['qty']*$data['price']); ?>
</td>

</tr>

</table>

<table class="summary">

<tr>

<td>PPN</td>

<td align="right">
Rp <?= number_format($data['ppn']); ?>
</td>

</tr>

<tr>

<td>DP</td>

<td align="right">
Rp <?= number_format($data['dp']); ?>
</td>

</tr>

<tr>

<th>Grand Total</th>

<th align="right">
Rp <?= number_format($data['grand_total']); ?>
</th>

</tr>

</table>

<div class="clear"></div>

<div class="ttd">

Tangerang,
<?= date('d-m-Y'); ?>

<br><br><br><br><br>

(______________________)

</div>

<div class="clear"></div>

<button onclick="window.print()">
🖨 Cetak Faktur
</button>

</body>

</html>