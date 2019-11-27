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
    <title>Administrator	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
          <h1 align="center"><img src="images/softel.png" width="378" height="59" align="middle"></h1>
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Navegación de palanca
</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            </button>
              <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
                 
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
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> Estado</a>
                    </li>
                    
					<li>
                        <a href="reservation.php"><i class="fa fa-bar-chart-o"></i> Reserva de habitacion
</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-desktop"></i> Recursos Humanos
</a>
                    </li>
                    <li>
                        <a href="inventario.php"><i class="fa fa-qrcode"></i> Inventario</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Consulta general</a>
                    </li>

                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                    </li>




					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            estado <small>Reserva de habitacion
 </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
						include ('db.php');
          ?>





					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">

							<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											<button class="btn btn-default" type="button">
												reserva de habitaciones
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
                                            <th>Nombre</th>
                                            <th>correo</th>

											<th>Habitacion</th>
											<th>cama</th>
											<th>estado</th>
											<th>entrada</th>
											<th>salida</th>

                                        </tr>
                                    </thead>
                                    <tbody>

									<?php

                  $sqlreserva=mysqli_query($conexion,"SELECT ha.tipo_habitacion,ha.tipo_cama,ha.estado,
                                                  hu.id_huesped,hu.nombre,hu.correo,hu.identificacion,
                                                  r.cod_reserva,r.fecha_ingreso,r.fecha_salida,r.cod_huespedfk,
                                                  hh.cod_habitacionfk,hh.cod_huespedfk
                                                    FROM habitaciones ha
                                                    INNER JOIN habitacion_huesped hh ON ha.id_habitacion = hh.cod_habitacionfk
                                                    INNER JOIN huesped hu ON hh.cod_huespedfk = hu.id_huesped
                                                    INNER JOIN reservas r ON r.cod_huespedfk = hu.id_huesped");// WHERE email=$_SESSION[email]
                        while ($c_reserva=mysqli_fetch_array($sqlreserva))
                        {
                          $r_id=$c_reserva['identificacion'];
                          $r_nombre=$c_reserva['nombre'];
                          $r_correo=$c_reserva['correo'];
                          $r_habitacion=$c_reserva['tipo_habitacion'];
                          $r_cama=$c_reserva['tipo_cama'];
                          $r_estado=$c_reserva['estado'];
                          $r_entrada=$c_reserva['fecha_ingreso'];
                          $r_salida=$c_reserva['fecha_salida'];
                          }

                          echo"<tr>
    												<th>".$r_id."</th>
    												<th>".$r_nombre."</th>
    												<th>".$r_correo."</th>
    												<th>".$r_habitacion."</th>
    												<th>".$r_cama."</th>
    												<th>".$r_estado."</th>
    												<th>".$r_entrada."</th>
    												<th>".$r_salida."</th>
    												</tr>";
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





                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>
