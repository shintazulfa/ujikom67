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

$query = mysqli_query($conn,"
DELETE FROM perusahaan
WHERE id_perusahaan='$id'
");

if($query){

    header("Location:index.php");
    exit;

}else{

    echo mysqli_error($conn);

}

?>