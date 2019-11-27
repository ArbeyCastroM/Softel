<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario_softel";

$conexioni = mysqli_connect($servername, $username, $password,$dbname);
if (!$conexioni) {
    die("Connection failed: " . mysqli_connect_error());
}
