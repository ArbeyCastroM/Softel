<?php
session_start();
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Amenecer</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->

        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">

        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Navegación de palanca
</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> Perfil del usuario
</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Configuraciones
</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión
</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="home.php"><i class="fa fa-dashboard"></i> estado</a>
                    </li>
                    <li>
                      <a  href="messages.php"><i class="fa fa-desktop"></i> Recursos Humanos
</a>
                    </li>
					<li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Reserva de habitacion
</a>
                    </li>
                    <li>
                      <a class="active-menu" href="inventario.php"><i class="fa fa-qrcode"></i> Inventario</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Informes</a>
                    </li>
                  
                    <li>
                        <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión
</a>
                    </li>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Inventario<small>registar producto</small>
                        </h1>

                    </div>
                </div>
                 <!-- /. ROW  -->
				 <?php
				include('db.php');
        //include('conexionrh.php')
				?>
        <?php ///////////////////////////////////////////////////7 ?>
        <div class="row">

            <div class="col-md-5 col-sm-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      Inventario
                    </div>
                    <div class="panel-body">


        <form name="form" method="post" action="insertar_inventario.php">

                        <div class="form-group">

                          <label>empleado que recibe</label>
                              <select name="idencargado" class="form-control" required >
                                <option value selected ></option>
                                <?php
                          $sqlEmpleado=mysqli_query($conexion,"SELECT id_empleado,codigo,nombre,cargo FROM empleados WHERE cargo='vigilante'");
                            while($c_empleados=mysqli_fetch_array($sqlEmpleado))
                              {

                                $r_idEmpleado=$c_empleados['id_empleado'];
                                $r_Nempleado=$c_empleados['nombre'];
                                $r_cargoEmpleado=$c_empleados['cargo'];
                                $array=[$r_idEmpleado,$r_Nempleado,$r_cargoEmpleado];
                                echo "
                                <option value=\"$r_idEmpleado\">$array[0]-$array[1]-$array[2]</option>";
                              }
                ?>
                                  </select>

                          </div>
                          <div class="form-group">
                          <label>Nombre del producto*</label>
                          <input name="nombre" type ="text" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>Descripcion*</label>
                        <input name="descripcion" type ="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                      <label>marca</label>
                      <input name="marca" type ="text" class="form-control">
                      </div>
                      <div class="form-group">

                        <label>asunto*</label>
                        <select name="asunto" class="form-control" required >
                        <option value selected ></option>
                        <option value="in_producto">ingreso de producto</option>
                      </select>
                      </div>
                      <div class="form-group">

                        <label>descripcion (estado)*</label>
                        <select name="estado" class="form-control" required >
                        <option value selected ></option>
                        <option value="correcto">correcto</option>
                        <option value="defectuoso">defectuoso</option>
                      </select>
                      </div>
                      <div class="form-group">
                      <label>Fecha</label>
                      <input name="fecha" type ="date" class="form-control">
                      </div>
                      <div class="form-group">
                      <label>proveedor*</label>
                      <input name="proveedor" type ="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>contacto*</label>
                    <input name="contacto" type ="text" class="form-control" required>
                  </div>
                      <input type="submit" name="bsub_2" class="btn btn-primary">
                      </div>



                          </div>



                    </div>

                </div>


            <div class="panel panel-primary">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    <button class="btn btn-default" type="button">
                      productos guardados
<span class="badge"></span>
                    </button>
                    </a>
                                      </h4>
                                  </div>
                                  <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                      <div class="panel-body">
                                         <div class="panel panel-default">

                      <div class="panel-body">
                          <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                      <tr>
                                          <th>zona</th>
                                          <th>sede</th>
                                          <th>producto</th>

                    <th>estado</th>
                    <th>marca</th>
                    <th>descripcion</th>
                    <th>contacto</th>

                                      </tr>
                                  </thead>
                                  <tbody>

                <?php
                require 'conexionrh.php';
                require 'conexion_inventario.php';
                $sqlinventario=mysqli_query($conexioni,"SELECT z.id_zona,z.nombre_z,
                  s.id_sede,s.nombre_s,s.ubicacion_s,s.cod_zonafk,
                  en.id_encargado,en.cod_empleado_i,en.nombre_i,en.cod_sedefk,
                  pr.id_producto,pr.nombre_p,pr.descripcion_p,pr.marca_p,pr.cod_zonafk,pr.cod_encargadofk,
                  pp.cod_proveedorfk,pp.cod_productosfk,
                  pro.id_proveedor,pro.nombre_pr,pro.contacto_pr,pro.id_pr
                  FROM zona z INNER JOIN sede s on z.id_zona=s.cod_zonafk
                  INNER JOIN encargado en ON en.cod_sedefk=s.id_sede and en.cod_empleado_i=33
                  INNER JOIN productos pr ON pr.cod_encargadofk=en.id_encargado
                  INNER JOIN proveedor_productos pp ON pp.cod_productosfk=pr.id_producto
                  INNER JOIN proveedor pro ON pp.cod_proveedorfk=pro.id_proveedor and pro.id_pr=pr.id_producto
                   ");
                while($consulta_inventario=mysqli_fetch_array($sqlinventario))
                {
                  $c_i1=$consulta_inventario['nombre_z'];
                  $c_i2=$consulta_inventario['nombre_s'];
                  $c_i3=$consulta_inventario['nombre_p'];
                  $c_i4=$consulta_inventario['descripcion_p'];
                  $c_i5=$consulta_inventario['marca_p'];
                  $c_i6=$consulta_inventario['nombre_pr'];
                  $c_i7=$consulta_inventario['contacto_pr'];
                  echo"<tr>
                  <th>".$c_i1."</th>
                  <th>".$c_i2."</th>
                  <th>".$c_i3."</th>
                  <th>".$c_i4."</th>
                  <th>".$c_i5."</th>
                  <th>".$c_i6."</th>
                  <th>".$c_i7."</th>
                  </tr>";
                }

        ?>

                                  </tbody>
                              </table>

                          </div>
                      </div>
                  </div>
                    <!-- End  Basic Table  -->
                                      </div>
                                  </div>
                              </div>
            </div>
</div>
        </div>
            </div>
							    </p>


    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>
</html>
