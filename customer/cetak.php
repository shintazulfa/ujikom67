<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include "../config/koneksi.php";

$data=mysqli_query($conn,"SELECT * FROM customer");

?>

<h2>DATA CUSTOMER</h2>

<table border="1" cellpadding="10">

<tr>

<th>No</th>
<th>Nama Customer</th>
<th>Perusahaan</th>
<th>Alamat</th>

</tr>

<?php

$no=1;

while($d=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['nama_customer']; ?></td>

<td><?= $d['perusahaan_cust']; ?></td>

<td><?= $d['alamat']; ?></td>

</tr>

<?php } ?>

</table>

<script>

window.print();

</script>
