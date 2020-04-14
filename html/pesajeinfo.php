<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
  <title>Samara Cosmetics</title>
  <!-- Bootstrap Core CSS -->
  <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- You can change the theme colors from here -->
  <link href="css/colors/blue.css" id="theme" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/datatables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?php
    require('../conexion.php');
    $idbatch = $_POST['idbatch'];
    $referencia = $_POST['referencia'];
    $sql6 = mysqli_query($conn, "SELECT * FROM producto INNER JOIN batch ON batch.id_producto = producto.referencia INNER JOIN linea ON producto.id_linea = linea.id INNER JOIN propietario ON producto.id_propietario = propietario.id INNER JOIN presentacion_comercial ON producto.id_presentacion_comercial = presentacion_comercial.id WHERE batch.id_batch = $idbatch");
    $sql5 = mysqli_query($conn, "SELECT * FROM preguntas ORDER BY RAND()");
    $sql4 = mysqli_query($conn, "SELECT * FROM desinfectante");
    $sql3 = mysqli_query($conn, "SELECT cargo FROM cargo WHERE id = 1");
    $sql31 = mysqli_query($conn, "SELECT cargo FROM cargo WHERE id = 2");
    $sql32 = mysqli_query($conn, "SELECT cargo FROM cargo WHERE id = 3");
    $sql33 = mysqli_query($conn, "SELECT cargo FROM cargo WHERE id = 4");
    $sql2 = mysqli_query($conn, "SELECT * FROM formula INNER JOIN materia_prima ON formula.id_materiaprima = materia_prima.referencia WHERE formula.id_producto = $referencia");
  ?>

</head>

<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
  <svg class="circular" viewBox="25 25 50 50">
    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
  </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
  <!-- ============================================================== -->
  <!-- Topbar header - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <div class="navbar-header">
        <a class="navbar-brand">
          <!-- Logo text --><span>
                         
                         <!-- Light Logo text -->    
                         <img src="../assets/images/logo-light-text2.png" class="light-logo" alt="homepage"/></span>
        </a>
      </div>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <div class="navbar-collapse">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav mr-auto mt-md-0">
          <!-- This is  -->
          <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                  href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
          <!-- ============================================================== -->
          <!-- Search -->
          <!-- ============================================================== -->

        </ul>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">
          <!-- ============================================================== -->
          <!-- Profile -->
          <!-- ============================================================== -->
          <li class="nav-item dropdown">
            <!-- <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/campana.png" alt="noty" class="profile-pic m-r-12" /></a>-->
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="true" id="dropdownMenuenlace">Jonathan Hernandez <i
                class="fas fa-chevron-circle-down"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuenlace">
              <a href="#" class="dropdown-item">Cambiar contraseña</a>
              <a href="../index.html" class="dropdown-item">Cerrar sesión</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- ============================================================== -->
  <!-- End Topbar header -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Left Sidebar - style you can find in sidebar.scss  -->
  <!-- ============================================================== -->

  <!-- ============================================================== -->
  <!-- End Left Sidebar - style you can find in sidebar.scss  -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Page wrapper  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
      <div class="col-md-5 col-2 align-self-center">
        <h1 class="text-themecolor m-b-0 m-t-0"><b>Pesaje</b></h1>
      </div>
      <div class="col-md-3 col-4 align-self-center">
        <!-- Search form -->
      </div>
      <div class="col-md-2 col-8 align-self-center">

      </div>


      <div class="col-md-2 col-2 align-self-center">
        <div class="container">
          <!-- Trigger the modal with a button -->

        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal2" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form method="post" onsubmit="return enviar();">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Firmar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row page">
                <div class="col-md-6 col-2 align-self-center">
                  <label for="recipient-name" class="col-form-label">Usuario:</label>
                  <input type="text" class="form-control" id="usuario" name="usuario">
                </div>
                <div class="col-md-6 col-2 align-self-center">
                  <label for="recipient-name" class="col-form-label">Contraseña:</label>
                  <input type="password" class="form-control" id="contrasena" name="contrasena">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <input type="submit" class="btn btn-primary" value="Firmar">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form method="post" onsubmit="return enviar2();">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Firmar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row page">
              <div class="col-md-6 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Usuario:</label>
                <input type="text" class="form-control" id="usuario2" name="usuario2">
              </div>
              <div class="col-md-6 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena2" name="contrasena2">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="Firmar">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal4" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Firmar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row page">
            <div class="col-md-6 col-2 align-self-center">
              <label for="recipient-name" class="col-form-label">Usuario:</label>
              <input type="text" class="form-control" id="usuario3">
            </div>
            <div class="col-md-6 col-2 align-self-center">
              <label for="recipient-name" class="col-form-label">Contraseña:</label>
              <input type="password" class="form-control" id="contrasena3">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-primary" value="Firmar">
      </form>
    </div>
  </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal5" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Firmar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row page">
            <div class="col-md-6 col-2 align-self-center">
              <label for="recipient-name" class="col-form-label">Usuario:</label>
              <input type="text" class="form-control" id="usuario4">
            </div>
            <div class="col-md-6 col-2 align-self-center">
              <label for="recipient-name" class="col-form-label">Contraseña:</label>
              <input type="password" class="form-control" id="contrasena4">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-primary" value="Firmar">
      </form>
    </div>
  </div>
</div>
</div>
<!-- Modal -->
<!-- Modal -->


<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
  <!-- column -->
  <div class="col-lg-12">
    <div id="accordion">
      <?php
        while ($rows = mysqli_fetch_assoc($sql6)) {
          ?>
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne" style="width: 100%">
                  <b>INFORMACIÓN DEL PRODUCTO</b>
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <form method='post' id='userform' action='preguntas.php'>
                  <div class="row" style="margin: 1%">

                    <div class="col-md-4 col-2 align-self-right">
                      <label for="recipient-name" class="col-form-label">Fecha:</label>
                      <input type="date" class="form-control" id="fecha" name="fechaprogramacion"
                             min="<?php $hoy = date("Y-m-d"); ?>" required>
                    </div>
                    <div class="col-md-4 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">No Orden:</label>
                      <input type="text" class="form-control" id="recipient2-name"
                             value="<?php echo $rows['numero_orden']; ?>" readonly>
                      <input type="text" class="form-control" name="idbatch" value="<?php echo $rows['id_batch']; ?>"
                             hidden>
                    </div>
                    <div class="col-md-4 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">No Lote:</label>
                      <input type="text" class="form-control" id="recipient2-name"
                             value="<?php echo $rows['numero_lote']; ?>" readonly>
                    </div>
                  </div>
                  <div class="row" style="margin: 1%">
                    <div class="col-md-4 col-2 align-self-right">
                      <label for="recipient-name" class="col-form-label">Referencia:</label>
                      <input type="text" class="form-control" id="recipient-name"
                             value="<?php echo $rows['referencia']; ?>" readonly>
                    </div>
                    <div class="col-md-4 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Nombre Referencia:</label>
                      <input type="text" class="form-control" id="recipient2-name"
                             value="<?php echo $rows['nombre_referencia']; ?>" readonly>
                    </div>
                    <div class="col-md-4 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Linea:</label>
                      <input type="text" class="form-control" id="recipient2-name"
                             value="<?php echo $rows['nombre_linea']; ?>" readonly>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <?php
        }

      ?>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo" style="width: 100%">
              <b>DESPEJE DE LINEAS Y PROCESOS</b>
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <div class="row" style="margin: 1%">
              <div class="col-md-12 col-2 align-self-right">
                <h3 for="recipient-name" class="col-form-label" style="text-align: center; background-color: #C0C0C0">
                  Parámetros de control</h3>
              </div>
            </div>

            <div class="row" style="margin: 1%">

              <?php

                while ($rows = mysqli_fetch_array($sql5)) {


                  ?>
                  <div class="col-md-10 col-2 align-self-right">
                    <a for="recipient-name" class="col-form-label"><?php echo $rows['pregunta']; ?> </a>
                  </div>
                  <div class="col-md-1 col-0 align-self-center">
                    <label class="checkbox"> <input type="checkbox" name='checkboxvar[]' value="si"/></label>
                  </div>
                  <div class="col-md-1 col-0 align-self-center">
                    <label class="checkbox"> <input type="checkbox" name='checkboxvar[]' value="no"/></label>
                  </div>
                  <input type="text" name='checkboxvar[]' value="<?php echo $rows['id']; ?>" hidden/>
                  <input type="text" name='checkboxvar[]' value="<?php echo $idbatch; ?>" hidden/>

                  <?php
                }

              ?>

            </div>


            <div class="row" style="margin: 1%">
              <div class="col-md-12 col-2 align-self-right">
                <h3 for="recipient-name" class="col-form-label" style="text-align: center; background-color: #C0C0C0">
                  Desinfección </h3>
              </div>
            </div>
            <div class="row" style="margin: 1%">

              <div class="col-md-4 col-2 align-self-right">
                <label for="recipient-name" class="col-form-label">Producto de desinfección</label>
                <select class="form-control " name="desinfectante" required>
                  <option selected="true" disabled="disabled">Seleccione...</option>
                  <?php
                    while ($rows = mysqli_fetch_assoc($sql4)) {
                      echo "<option value=" . $rows['id'] . ">" . $rows['nombre'] . "</option>";
                    }
                  ?>
                </select>
              </div>

              <div class="col-md-8 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Observaciones:</label>
                <input type="text" class="form-control" name="observaciones" id="recipient2-name">
              </div>
            </div>
            <div class="row" style="margin: 1%">
              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Realizado Por:</label>
                <div id="firma1" class="displayallinfo" name="firma1"></div>
              </div>
              <div class="col-md-2 col-2 align-self-center" style="margin-top: 2.8%">
                <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2"
                       style="width: 100%; height: 38px;" value="Firmar">
              </div>

              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Verificado Por:</label>
                <div id="firma2" class="displayallinfo" name="nombrereferencia"></div>
              </div>
              <div class="col-md-2 col-2 align-self-center" style="margin-top: 2.8%">
                <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal3"
                       style="width: 100%; height: 38px;" value="Firmar">
              </div>
            </div>
            <div class="row" style="margin: 1%">
              <div class="col-md-12 col-2 align-self-center" style="margin-left: 85%">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Aceptar</button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                  aria-expanded="false" aria-controls="collapseThree" style="width: 100%">
            <b>PESAJE Y DISPENSACIÓN</b>
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
          <div class="row" style="margin: 1%">
            <div class="col-md-12 col-2 align-self-center">
              <h3 for="recipient-name" class="col-form-label" style="text-align: center; background-color: #C0C0C0">
                Formula Maestra</h3>
            </div>
            <div class="row" style="margin: 1%; text-align: center;">
              <div class="col-md-3 col-2 align-self-right">
                <label for="recipient-name" class="col-form-label"><b>Entrega de formula Maestra para solicitud de
                    materia prima</b></label>

              </div>
              <div class="col-md-3 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label"><b>Lleva Materia prima a la escusa</b></label>

              </div>
              <div class="col-md-3 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label"><b>Verificación del estado de Identificación y
                    Aprovación Materias primas</b></label>

              </div>
              <div class="col-md-3 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label"><b>Toma de materia prima de la esclusa</b></label>

              </div>
            </div>
          </div>

          <div class="row" style="margin: 1%; text-align: center;">
            <?php
              while ($rows = mysqli_fetch_assoc($sql32)) {
                ?>
                <div class="col-md-3 col-2 align-self-right">

                  <input type="text" class="form-control" id="recipient-name" value="<?php echo $rows['cargo']; ?>"
                         readonly style="text-align: center !important;">
                </div>
                <?php
              }

            ?>

            <?php
              while ($rows = mysqli_fetch_assoc($sql31)) {
                ?>
                <div class="col-md-3 col-2 align-self-right">

                  <input type="text" class="form-control" id="recipient-name" value="<?php echo $rows['cargo']; ?>"
                         readonly style="text-align: center !important;">
                </div>
                <?php
              }

            ?>
            <?php
              while ($rows = mysqli_fetch_assoc($sql33)) {
                ?>
                <div class="col-md-3 col-2 align-self-right">

                  <input type="text" class="form-control" id="recipient-name" value="<?php echo $rows['cargo']; ?>"
                         readonly style="text-align: center !important;">
                </div>
                <?php
              }

            ?>
            <?php
              while ($rows = mysqli_fetch_assoc($sql3)) {
                ?>
                <div class="col-md-3 col-2 align-self-right">

                  <input type="text" class="form-control" id="recipient-name" value="<?php echo $rows['cargo']; ?>"
                         readonly style="text-align: center !important;">
                </div>
                <?php
              }

            ?>
          </div>

          <div class="card-body">
            <div class="row" style="margin: 1%">
              <div class="col-md-12 col-2 align-self-center">
                <h3 for="recipient-name" class="col-form-label" style="text-align: center; background-color: #C0C0C0">
                  Pesaje</h3>
              </div>
              <div class="col-md-12 col-2 align-self-center">

                <table class="table">
                  <thead>
                  <tr>
                    <th>Referencia</th>
                    <th>Materia prima</th>
                    <th>Peso GRS</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    while ($rows = mysqli_fetch_assoc($sql2)) {
                      ?>
                      <tr>
                        <td><input type="text" class="form-control" nombre="referencia"
                                   value="<?php echo $rows['referencia']; ?>" readonly></td>
                        <td><input type="text" class="form-control" nombre="alias" value="<?php echo $rows['alias']; ?>"
                                   readonly></td>
                        <td><input type="text" class="form-control" nombre="alias"
                                   value="<?php echo $rows['porcentaje']; ?>" readonly></td>
                      </tr>
                      <?php
                    }
                  ?>
                </table>
              </div>

            </div>
            <div class="row" style="margin: 1%">
              <input type="text" name="usuario1form" id="usuario1form" class="form-control" hidden/>
              <input type="text" name="contrasena1form" id="contrasena1form" class="form-control" hidden/>
              <input type="text" name="usuario2form" id="usuario2form" class="form-control" hidden/>
              <input type="text" name="contrasena2form" id="contrasena2form" class="form-control" hidden/>
              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Realizado Por:</label>
                <div id="firma3" class="displayallinfo" name="nombrereferencia"></div>
              </div>
              <div class="col-md-2 col-2 align-self-center" style="margin-top: 2.8%">
                <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal4"
                       style="width: 100%; height: 38px;" value="Firmar">
              </div>

              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Verificado Por:</label>
                <div id="firma4" class="displayallinfo" name="nombrereferencia"></div>
              </div>
              <div class="col-md-2 col-2 align-self-center" style="margin-top: 2.8%">
                <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal5"
                       style="width: 100%; height: 38px;" value="Firmar">
              </div>
            </div>
            <div class="row" style="margin: 1%">
              <div class="col-md-12 col-2 align-self-center" style="margin-left: 86.5%">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>
              </form>
            </div>


            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
          </div>
        </div>

      </div>


      <!-- ============================================================== -->
      <!-- All Jquery -->
      <!-- ============================================================== -->


      <script src="../assets/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
      <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="vendor/datatables/datatables.min.js"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="js/jquery.slimscroll.js"></script>
      <!--Wave Effects -->
      <script src="js/waves.js"></script>
      <!--Menu sidebar -->
      <script src="js/sidebarmenu.js"></script>
      <!--stickey kit -->
      <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
      <!--Custom JavaScript -->
      <script src="js/custom.min.js"></script>
      <script src="js/datatables.js"></script>
      <script>
          function enviar() {

              $('#myModal2').modal('hide');
              var usuario = document.getElementById('usuario').value;
              var contrasena = document.getElementById('contrasena').value;

              var dataen = 'usuario=' + usuario + '&contrasena=' + contrasena;

              $.ajax({
                  type: 'POST',
                  url: 'controller/save.php',
                  data: dataen,
                  success: function (resp) {
                      $('#firma1').html(resp);


                  }
              });
              return false;

          }
      </script>
      <script>
          function enviar2() {

              $('#myModal3').modal('hide');
              var usuario2 = document.getElementById('usuario2').value;
              var contrasena2 = document.getElementById('contrasena2').value;

              var dataen = 'usuario2=' + usuario2 + '&contrasena2=' + contrasena2;

              $.ajax({
                  type: 'POST',
                  url: 'controller/save2.php',
                  data: dataen,
                  success: function (resp) {
                      $('#firma2').html(resp);


                  }
              });
              return false;

          }
      </script>
      <script type="text/javascript">
          $(function () {
              var $src = $('#usuario'),
                  $dst = $('#usuario1form');
              $src.on('input', function () {
                  $dst.val($src.val());
              });
          });
      </script>
      <script type="text/javascript">
          $(function () {
              var $src = $('#contrasena'),
                  $dst = $('#contrasena1form');
              $src.on('input', function () {
                  $dst.val($src.val());
              });
          });
      </script>
      <script type="text/javascript">
          $(function () {
              var $src = $('#usuario2'),
                  $dst = $('#usuario2form');
              $src.on('input', function () {
                  $dst.val($src.val());
              });
          });
      </script>
      <script type="text/javascript">
          $(function () {
              var $src = $('#contrasena2'),
                  $dst = $('#contrasena2form');
              $src.on('input', function () {
                  $dst.val($src.val());
              });
          });
      </script>
</body>

</html>
