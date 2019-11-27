<?php
require 'conexion_inventario.php';
/* datos de la reserva*/
if(isset($_POST['bsub_2']))
{
$id_encargado=$_POST['idencargado'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['estado'];
$marca=$_POST['marca'];

//reporte

$in_producto=$_POST['asunto'];
$estado=$_POST['estado'];
$fecha=$_POST['fecha'];
//proveedor
$proveedor=$_POST['proveedor'];
$contacto=$_POST['contacto'];

$sqlproducto = "INSERT INTO productos(nombre_p,descripcion_p,marca_p,cod_zonafk,cod_encargadofk)
                  VALUES ('$nombre','$descripcion','$marca',1,'$id_encargado')";
if(mysqli_query($conexioni,$sqlproducto))
{
$sql_productos=mysqli_query($conexioni,"SELECT id_producto FROM productos  WHERE cod_encargadofk='$id_encargado'");
  while($c_producto=mysqli_fetch_array($sql_productos))
    {
      $var_p1=$c_producto['id_producto'];
      echo $var_p1;
    }

}
$sqlreporte = "INSERT INTO reporte(asunto,descripcion,fecha,cod_encargadofk) VALUES ('$in_producto','$estado','$fecha','$id_encargado')";
if(mysqli_query($conexioni,$sqlreporte))
{}else {
  echo "error";
}

$sqlproveedor = "INSERT INTO proveedor(nombre_pr,contacto_pr,id_pr) VALUES ('$proveedor','$contacto','$var_p1')";
if(mysqli_query($conexioni,$sqlproveedor))
{
$sql_proveedor=mysqli_query($conexioni,"SELECT id_proveedor FROM proveedor WHERE id_p='$var_p1'");
  while ($c_idproveedor=mysqli_fetch_array($sql_proveedor))
    {
      $var_id_proveedor=$c_idproveedor['id_proveedor'];
    }
}
$sqlproveedor_productos = "INSERT INTO proveedor_productos(cod_proveedorfk,cod_productosfk)VALUES ($var_id_proveedor,$var_p1)";
if(mysqli_query($conexioni,$sqlproveedor_productos))
{
      header('Location:inventario.php');
    }



}


?>
