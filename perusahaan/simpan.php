<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

error_reporting(E_ALL);
ini_set('display_errors',1);

include "../config/koneksi.php";

$nama_perusahaan = $_POST['nama_perusahaan'];
$alamat          = $_POST['alamat'];
$no_telp         = $_POST['no_telp'];
$tax             = $_POST['tax'];

$query = mysqli_query($conn,"
INSERT INTO perusahaan
(
nama_perusahaan,
alamat,
no_telp,
tax
)
VALUES
(
'$nama_perusahaan',
'$alamat',
'$no_telp',
'$tax'
)
");

if($query){

    header("Location:index.php");
    exit;

}else{

    echo "Gagal menyimpan data.<br>";
    echo mysqli_error($conn);

}

?>