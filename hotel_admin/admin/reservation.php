<?php
include('db.php')
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESERVACION HOTEL SOFTEL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="../index.php"><i class="fa fa-home"></i> Página principal
</a>
                    </li>

					</ul>

            </div>

        </nav>

        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            RESERVACION <small></small>
                        </h1>
                    </div>
                </div>


            <div class="row">

                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          INFORMACION PERSONAL
                        </div>
                        <div class="panel-body">
						<form name="form" method="post" action="insertar_reserva.php">
                            <div class="form-group">
                                            <label>Trato*</label>
                                            <select name="trato" class="form-control" required >
												<option value selected ></option>
                                                <option value="sr.">Sr.</option>
                                                <option value="srta.">Srta.</option>
                                            </select>
                              </div>
                              <div class="form-group">
                                                          <label>identificacion*</label>
                                                          <input name="id" class="form-control" required>

                                             </div>
							  <div class="form-group">
                                            <label>Nombre*</label>
                                            <input name="nombre" class="form-control" required>

                               </div>
							   <div class="form-group">
                                            <label>Apellido*</label>
                                            <input name="apellido" class="form-control" required>

                               </div>
							   <div class="form-group">
                                            <label>Email*</label>
                                            <input name="correo" type="email" class="form-control" required>

                               </div>



							

								<div class="form-group">
                                            <label>Telefono*</label>
                                            <input name="telefono" type ="text" class="form-control" required>

                               </div>

                        </div>

                    </div>
                </div>


            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                     INFORMACIÓN DE RESERVA

                        </div>
                        <div class="panel-body">
								<div class="form-group">
                                            <label>Tipo de habitación*</label>
                                            <select name="tipo_habitacion"  class="form-control" required>
												<option value selected ></option>
                                                <option value="Superior Room">HABITACIÓN SUPERIOR(40000)</option>
                                                <option value="Deluxe Room">HABITACIÓN DE LUJO(60000)</option>
												<option value="Guest House">CASA DE HUESPEDES(50000)</option>
												<option value="Single Room">HABITACIÓN INDIVIDUAL(30000)
</option>
                                            </select>
                              </div>

							  <div class="form-group">
                                            <label>Tipo de cama
</label>
                                            <select name="tipo_cama" class="form-control" required>
												<option value selected ></option>
                                                <option value="Single">Simple</option>
                                                <option value="Double">Doble</option>


                                            </select>
                              </div>




							  <div class="form-group">
                                            <label>Entrada</label>
                                            <input name="entrada" type ="date" class="form-control">

                               </div>
							   <div class="form-group">
                                            <label>Salida</label>
                                            <input name="salida" type ="date" class="form-control">

                               </div>

                       </div>

                    </div>
                    <input type="submit" name="bsub" class="btn btn-primary">

                </div>
            </div>


                </div>



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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>
</html>
