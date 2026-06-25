<?php
session_start();

if(isset($_SESSION['login'])){
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Login Administrator</title>

<style>

body{
    margin:0;
    padding:0;
    font-family:Arial;
    background:#4a73c9;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.box{
    width:350px;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,.3);
}

h2{
    text-align:center;
}

input{
    width:100%;
    padding:10px;
    margin-top:8px;
    margin-bottom:15px;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:10px;
    background:#4a73c9;
    color:white;
    border:none;
    cursor:pointer;
}

button:hover{
    background:#355aa8;
}

</style>

</head>

<body>

<div class="box">

<h2>LOGIN ADMIN</h2>

<form method="POST" action="cek_login.php">

Username

<input type="text" name="username" required>

Password

<input type="password" name="password" required>

<button type="submit">

LOGIN

</button>

</form>

</div>

</body>

</html>