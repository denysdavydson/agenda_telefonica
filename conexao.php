<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'test';

// conex�o e sele��o do banco de dados
$con = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($con, "utf8");

$conn = new PDO("mysql:host=" . $host . ";dbname=" . $db . ";charset=utf8", $user, $pass);
?>

