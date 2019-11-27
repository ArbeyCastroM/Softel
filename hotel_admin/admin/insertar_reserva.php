<?php
require 'db.php';
/* datos de la reserva*/
if(isset($_POST['bsub']))
{
$tipo_habitacion=$_POST['tipo_habitacion'];
$tipo_cama=$_POST['tipo_cama'];
$entrada=$_POST['entrada'];
$salida=$_POST['salida'];


$trato=$_POST['trato'];
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
//insercion de datos

$sqlhabitacion = "INSERT INTO habitaciones(precio,descripcion,tipo_habitacion,tipo_cama,estado,iden_huesped,id_hotel)
                  VALUES (200000,'confortable','$tipo_habitacion','$tipo_cama','reservado','$id',1)";
if(mysqli_query($conexion,$sqlhabitacion))
{
$sql_Habitacion=mysqli_query($conexion,"SELECT id_habitacion  FROM habitaciones WHERE iden_huesped='$id'");
  while($c_idhabitacion=mysqli_fetch_array($sql_Habitacion))
    {
      $var_id_habitacion=$c_idhabitacion['id_habitacion'];
    }


}
$sqlhuesped = "INSERT INTO huesped(trato, identificacion,nombre,apellido,correo,telefono) VALUES ('$trato','$id','$nombre','$apellido','$correo','$telefono')";
if(mysqli_query($conexion,$sqlhuesped))
{
$sql_Huesped=mysqli_query($conexion,"SELECT id_huesped FROM huesped WHERE identificacion='$id'");
  while ($c_idhuesped=mysqli_fetch_array($sql_Huesped))
    {
      $var_id_huesped=$c_idhuesped['id_huesped'];
    }
}
$sqlhabitacion_huesped = "INSERT INTO habitacion_huesped(cod_habitacionfk,cod_huespedfk) VALUES ($var_id_habitacion,$var_id_huesped)";
if(mysqli_query($conexion,$sqlhabitacion_huesped))
{}else {echo "error";}

echo $entrada;
$sql_reserva = "INSERT INTO reservas(fecha_ingreso,fecha_salida,cod_huespedfk) VALUES ('$_POST[entrada]','$_POST[salida]',5)";
if(mysqli_query($conexion,$sql_reserva))
{
  echo "<script>alert('reserva exitosa');</script>";
  header('Location:reservation.php');
}
}


?>
