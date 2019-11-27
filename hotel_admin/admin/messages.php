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
                        <a class="active-menu" href="messages.php"><i class="fa fa-desktop"></i> Recursos Humanos
</a>
                    </li>
					<li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Reserva de habitacion
</a>
                    </li>
                    <li>
                        <a href="inventario.php"><i class="fa fa-qrcode"></i> Inventario</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Consulta general</a>
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
                           Recursos Humanos<small>-Asignar eventos</small>
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
                      Eventos
                    </div>
                    <div class="panel-body">


        <form name="form" method="post" action="insertar_eventos.php">

                        <div class="form-group">

                          <label>seleccione el empleado</label>
                              <select name="empleado" class="form-control" required >
                                <option value selected ></option>
                                <?php
                          $sqlEmpleado=mysqli_query($conexion,"SELECT id_empleado,codigo,nombre,cargo FROM empleados WHERE codigo='33'");
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
                            <label>Seleccione el evento*</label>
                            <select name="nombre_evento" class="form-control" required >
                            <option value selected ></option>
                            <option value="seguridad">seguridad</option>
                            <option value="ambiente">Ambiente</option>
                            <option value="gerencia">Gerencia</option>
                          </select>

                          </div>
                          <div class="form-group">
                            <label>Seleccione tipo*</label>
                            <select name="tipo_evento" class="form-control" required >
                            <option value selected ></option>
                            <option value="obligatorio">obligatorio</option>
                            <option value="opcional">opcional</option>
                          </select>

                          </div>
                          <div class="form-group">
                          <label>Descripcion</label>
                          <input name="descripcion" type ="text" class="form-control">
                        </div>
                          <div class="form-group">
                          <label>Fecha</label>
                          <input name="fecha" type ="date" class="form-control">

                          </div>
                          <div class="form-group">
                            <label>Duracion*</label>
                            <select name="duracion" class="form-control" required >
                            <option value selected ></option>
                            <option value="dia">1 dia</option>
                            <option value="semana">1 semana</option>
                          </select>

                          </div>
                          <div class="form-group">
                          <label>ubicacion</label>
                          <input name="ubicacion" type ="text" class="form-control">
                        </div>
                          <input type="submit" name="bsub_1" class="btn btn-primary">

                          </div>



                    </div>

                </div>

            </div>
            <div class="panel panel-primary">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    <button class="btn btn-default" type="button">
                      Recursos Humanos
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
                                          <th>id</th>
                                          <th>codigo</th>
                                          <th>cargo</th>

                    <th>area</th>
                    <th>evento</th>
                    <th>descripcion</th>
                    <th>ubicacion</th>

                                      </tr>
                                  </thead>
                                  <tbody>

                <?php
                require 'conexionrh.php';

                /*SELECT tabla_a.campo, tabla_b.campo
                FROM base_datos_a.tabla_a AS tabla_a, base_datos_b.tabla_b AS tabla_b*/
$sqlemleado=mysqli_query($conexionrh,"SELECT empleados.id_empleado,empleados.codigo,
                        empleados_r.id_empleados,empleados_r.cargo,empleados_r.cod_areasfk,areas.id_area,areas.nombre_a,
                        empleados_eventos.cod_empleadosfk,empleados_eventos.cod_eventosfk,
                        eventos.id_evento,eventos.id_empleado,eventos.nombre_e,eventos.tipo,eventos.descripcion,eventos.fecha,eventos.ubicacion
                        from  softel.empleados
                        INNER JOIN recursos_humanos.empleados_r on empleados.id_empleado= empleados_r.id_empleados and empleados.codigo=33
                        INNER JOIN recursos_humanos.areas on areas.id_area=empleados_r.cod_areasfk
                        INNER JOIN recursos_humanos.empleados_eventos on empleados_eventos.cod_empleadosfk=empleados_r.id_empleados
                        INNER JOIN recursos_humanos.eventos on empleados_eventos.cod_eventosfk=eventos.id_evento
            ");
                while ($consulta_empleado=mysqli_fetch_array($sqlemleado))
                      {
                        $r_em1=$consulta_empleado['id_empleado'];
                        $r_em2=$consulta_empleado['codigo'];
                        $r_em3=$consulta_empleado['cargo'];
                        $r_em4=$consulta_empleado['nombre_a'];
                        $r_em5=$consulta_empleado['nombre_e'];
                        $r_em6=$consulta_empleado['descripcion'];
                        $r_em7=$consulta_empleado['ubicacion'];

                        echo"<tr>
                        <th>".$r_em1."</th>
                        <th>".$r_em2."</th>
                        <th>".$r_em3."</th>
                        <th>".$r_em4."</th>
                        <th>".$r_em5."</th>
                        <th>".$r_em6."</th>
                        <th>".$r_em7."</th>
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
