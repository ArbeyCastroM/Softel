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
    <title> HOTEL Amanecer</title>
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
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> Perfil del usuario</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
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
                        <a href="home.php"><i class="fa fa-dashboard"></i> Estado</a>
                    </li>
                    <li>
                        <a  href="messages.php"><i class="fa fa-desktop"></i> Boletines informativos</a>
                    </li>
					<li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Reserva de habitacion</a>
                    </li>
                    <li>
                        <a class="active-menu" href="payment.php"><i class="fa fa-qrcode"></i> Inventario</a>
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

        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                          Inventario<small> </small>
                        </h1>
                    </div>
                </div>
                 <!-- /. ROW  -->


                 <div class="panel-body">


     <form name="form" method="post" action="insertar_eventos.php">

                     <div class="form-group">

                       <label>seleccione el empleado</label>

                           <select name="empleado" class="form-control" required >
                             <option value selected ></option>
                             <?php
                            include('db.php');
                            //include('conexionrh.php')
                            ?>
                             <?php
                       $sqlEmpleado=mysqli_query($conexionrh,"SELECT id_empleado,codigo,nombre,cargo FROM empleados WHERE codigo='33'");
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
                <!-- /. ROW  -->

                </div>

            </div>


    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
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
