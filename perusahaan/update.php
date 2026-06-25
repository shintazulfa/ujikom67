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
$id       = $_POST['id_perusahaan'];
$alamat   = $_POST['alamat'];
$no_telp  = $_POST['no_telp'];
$tax      = $_POST['tax'];

$query = mysqli_query($conn,"
UPDATE perusahaan SET

nama_perusahaan='$nama_perusahaan',
alamat='$alamat',
no_telp='$no_telp',
tax='$tax'

WHERE id_perusahaan='$id'
");

if($query){

    header("Location:index.php");
    exit;

}else{

    echo mysqli_error($conn);

}

?>