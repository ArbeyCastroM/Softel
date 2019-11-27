<?php
require 'conexionrh.php';
if(isset($_POST['bsub_1']))
{
// beneficios
$Idempleado=$_POST['empleado'];
$nombre_evento=$_POST['nombre_evento'];
$tipo_evento=$_POST['tipo_evento'];
$descripcion=$_POST['descripcion'];
$fecha=$_POST['fecha'];
$duracion=$_POST['duracion'];
$ubicacion=$_POST['ubicacion'];
//


$sqlevento = "INSERT INTO eventos(id_empleado,nombre_e,tipo,descripcion,fecha,duracion,ubicacion)
                  VALUES ('$Idempleado','$nombre_evento','$nombre_evento','$descripcion','$fecha','$duracion','$ubicacion')";
if(mysqli_query($conexionrh,$sqlevento))
{
$sql_evento=mysqli_query($conexionrh,"SELECT id_evento  FROM eventos WHERE id_empleado='$Idempleado'");
  while($c_idevento=mysqli_fetch_array($sql_evento))
    {
      $var_idevento=$c_idevento['id_evento'];
    }
}
$sqlempleados_eventos = "INSERT INTO empleados_eventos(cod_empleadosfk,cod_eventosfk)
                  VALUES ($Idempleado,$var_idevento)";
                  if(mysqli_query($conexionrh,$sqlempleados_eventos))
                  {
                    header('Location:messages.php');
                  }
                  }



 ?>
