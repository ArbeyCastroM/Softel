<?php
$servername = "localhost";
$username = "root";
$password = "";
//$dbname = "recursos_humanos";

$conexionrh = mysqli_connect($servername, $username, $password);
if (!$conexionrh) {
    die("Connection failed: " . mysqli_connect_error());
}
