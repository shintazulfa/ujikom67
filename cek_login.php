<?php

session_start();

include "config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,"
SELECT *
FROM users
WHERE username='$username'
AND password='$password'
");

if(mysqli_num_rows($query)>0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];

    header("Location: dashboard.php");
    exit;

}else{

    echo "<script>

    alert('Username atau Password Salah');

    window.location='login.php';

    </script>";

}

?>