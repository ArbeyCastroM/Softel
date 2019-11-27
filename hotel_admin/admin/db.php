<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

$conexion = mysqli_connect($servername, $username, $password,$dbname);
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
/*class conectar
{
  private $servidor="localhost";
  private $usuario="root";
  private $basedatos="softel";
  private $password="";

  public function conexion()
  {
    $conexion=mysqli_connect($this->servidor,$this->usuario,$this->password,$this->basedatos);
    return $conexion;
  }

}
*/

?>
