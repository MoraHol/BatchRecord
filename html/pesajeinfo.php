<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Batch Record">
  <meta name="author" content="Samara Cosmetics">
  
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
  <title>Samara Cosmetics</title>
  
  <!-- Bootstrap Core CSS -->
  <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link href="../../html/css/style.css" rel="stylesheet">
  
  <!-- You can change the theme colors from here -->
  <link rel="stylesheet" href="../../html/css/colors/blue.css" id="theme">
  <link rel="stylesheet" href="../../html/css/custom.css">
  <link rel="stylesheet" href="../../html/vendor/jquery-confirm/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css" href="../../html/vendor/datatables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="../../html/vendor/datatables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
        <!-- script src="https://kit.fontawesome.com/6589be6481.js" crossorigin="anonymous"></script> -->
  
        <!-- Hoja de estilos Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">

<?php 
  include('modal/modal_firma.php');
  include('modal/modal_cambiarContrasena.php');
  include('modal/modal_observaciones.php');
  ?>

<div class="preloader">
  <svg class="circular" viewBox="25 25 50 50">
    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
  </svg>
</div>
<div id="main-wrapper" style="padding-top:15px; padding-left:15px; padding-right:15px">
  <header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
      <div class="navbar-header">
        <a class="navbar-brand">
        <span><img src="../../assets/images/logo-light-text2.png" class="light-logo" alt="homepage"/></span>
        </a>
      </div>
      <div class="navbar-collapse">
        <ul class="navbar-nav mr-auto mt-md-0">
          <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
              href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
        </ul>
        <ul class="navbar-nav my-lg-0">
          <li class="nav-item dropdown">
            <!-- <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/campana.png" alt="noty" class="profile-pic m-r-12" /></a>-->
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="true" id="dropdownMenuenlace">Berney Montoya
               <i class="large material-icons">account_circle</i><!-- <i
              class="fas fa-chevron-circle-down"> --></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuenlace">
              <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modalCambiarContrasena">Cambiar contraseña</a>
              <a href="../index.html" class="dropdown-item">Cerrar sesión</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 col-2 align-self-center">
        <h1 class="text-themecolor m-b-0 m-t-0"><b>Pesaje</b></h1>
      </div>
      <div class="col-md-3 col-4 align-self-center"></div>
      <div class="col-md-2 col-8 align-self-center"></div>
      <div class="col-md-2 col-2 align-self-center">
      <div class="container">
        <a href="../../pesaje" style="background-color:#fff;color:#FF8D6D" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down btn-md" role="button">Cola de Trabajo</a>
      </div>
      </div>
      </div>
    </div>

<div class="row">
  <!-- column -->
  <div class="col-lg-12">
    <div id="accordion">
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
            <div class="row" style="margin: 1%">
              <div class="col-md-4 col-2 align-self-right">
                <label for="recipient-name" class="col-form-label">Fecha:</label>
                <input type="date" class="form-control" id="in_fecha" name="fechaprogramacion" readonly>
              </div>
              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">No Orden:</label>
                <input type="text" class="form-control" id="in_numero_orden" readonly>
                <input type="text" class="form-control" name="idbatch"
                       hidden>
              </div>

              <div class="col-md-4 col-2 align-self-right">
                <label for="recipient-name" class="col-form-label">Referencia:</label>
                <input type="text" class="form-control" id="in_referencia"
                       readonly>
              </div>

            </div>
            <div class="row" style="margin: 1%">
              <div class="col-md-4 col-2 align-self-center">
                <label for="in_tamano_lote" class="col-form-label">Tamaño Lote (Kg)</label>
                <input type="text" class="form-control Numeric" id="in_tamano_lote"
                       readonly>
              </div>
              <div class="col-md-4 col-2 align-self-center">
                <label for="in_numero_lote" class="col-form-label">No Lote:</label>
                <input type="text" class="form-control" id="in_numero_lote"
                       readonly>
              </div>
              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Linea:</label>
                <input type="text" class="form-control" id="in_linea" readonly>
              </div>
              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Fecha de Programacion:</label>
                <input type="text" class="form-control" id="in_fecha_programacion"
                       readonly>
              </div>

            </div>
          </div>
        </div>
      </div>
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
            <div class="row justify-content-center" style="margin: 1%;  background-color: #C0C0C0">
              <div class="col-md-10 col-2 align-self-right">
                <h3 for="recipient-name" class="col-form-label"
                    style="text-align: center; background-color: #C0C0C0">Parámetros de control</h3>
              </div>
              <div class="col-md-1 col-0 align-self-center">
                <h3 for="recipient-name" class="col-form-label"
                    style=" background-color: #C0C0C0">&nbsp;&nbsp;&nbsp;Si</h3>
              </div>
              <div class="col-md-1 col-0 align-self-center">
                <h3 for="recipient-name" class="col-form-label"
                    style=" background-color: #C0C0C0">&nbsp;&nbsp;&nbsp;No</h3>
              </div>
            </div>

            <div class="row" id="preguntas-div" style="margin: 1%">

            </div>


            <div class="row" style="margin: 1%">
              <div class="col-md-12 col-2 align-self-right">
                <h3 for="recipient-name" class="col-form-label"
                    style="text-align: center; background-color: #C0C0C0">Desinfección </h3>
              </div>
            </div>
            <div class="row" style="margin: 1%">
              <div class="col-md-4 col-2 align-self-right">
                <label for="sel_producto_desinfeccion" class="col-form-label">Producto de desinfección</label>
                <select class="selectpicker form-control in_desinfeccion" id="sel_producto_desinfeccion">
                  <option selected>Seleccione</option>
                </select>
              </div>
              <div class="col-md-8 col-2 align-self-center">
                <label for="in_observaciones" class="col-form-label">Observaciones:</label>
                <input type="text" class="form-control in_desinfeccion" id="in_observaciones">
              </div>
            </div>
            <div class="row" style="margin: 1%">
              <div class="col-md-4 col-2 align-self-center">
                <label for="in_realizado" class="col-form-label">Realizado Por:</label>
                <input type="text" class="form-control in_desinfeccion" id="in_realizado">
              </div>
              <div class="col-md-2 col-2 align-self-center" style="margin-top: 2.8%">
                <input type="button" class="btn btn-danger in_desinfeccion" data-toggle="modal" data-target="#myModal2"
                       style="width: 100%; height: 38px;" value="Firmar">
              </div>

              <div class="col-md-4 col-2 align-self-center">
                <label for="in_verificado" class="col-form-label">Verificado Por:</label>
                <input type="text" class="form-control in_desinfeccion" id="in_verificado">
              </div>
              <div class="col-md-2 col-2 align-self-center" style="margin-top: 2.8%">
                <input type="button" class="btn btn-danger in_desinfeccion" data-toggle="modal" data-target="#myModal3"
                       style="width: 100%; height: 38px;" value="Firmar">
              </div>
            </div>
            <div class="row justify-content-end mt-5" style="margin: 1%; text-align: right">
              <div class="col-md-12 col-2 align-self-end">
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
                <label for="cargo-1" class="col-form-label"><b>Entrega de formula Maestra para solicitud de
                  materia prima</b></label>

              </div>
              <div class="col-md-3 col-2 align-self-center">
                <label for="cargo-2" class="col-form-label"><b>Lleva Materia prima a la escusa</b></label>

              </div>
              <div class="col-md-3 col-2 align-self-center">
                <label for="cargo-3" class="col-form-label"><b>Verificación del estado de Identificación y
                  Aprobación Materias primas</b></label>

              </div>
              <div class="col-md-3 col-2 align-self-center">
                <label for="cargo-4" class="col-form-label"><b>Toma de materia prima de la
                  esclusa</b></label>

              </div>
            </div>
          </div>
          <div class="row" style="margin: 1%; text-align: center;">
            <div class="col-md-3 col-2 align-self-right">

              <input type="text" class="form-control text-center" id="cargo-1" readonly>
            </div>
            <div class="col-md-3 col-2 align-self-center">

              <input type="text" class="form-control text-center" id="cargo-2" readonly>
            </div>
            <div class="col-md-3 col-2 align-self-center">

              <input type="text" class="form-control text-center" id="cargo-3" readonly>
            </div>
            <div class="col-md-3 col-2 align-self-center">

              <input type="text" class="form-control text-center" id="cargo-4" readonly>
            </div>
          </div>
          <hr>
          <div class="card-body">
            <div class="row" style="margin: 1%">
              <div class="col-md-12 col-2 align-self-center">
                <h3 for="recipient-name" class="col-form-label"
                    style="text-align: center; background-color: #C0C0C0">Pesaje</h3>
              </div>
              <div class="col-md-12 col-2 align-self-center">
                <form>
                  <table class="table" id="tablePesaje" style="width: 100%;">

                  </table>
                </form>
              </div>

            </div>
            <hr>
            <div class="row" style="margin: 1%">
              <div class="col-md-2 col-2 align-self-right">
                <label for="in_fecha_pesaje" class="col-form-label">Fecha:</label>
                <input type="date" class="form-control" id="in_fecha_pesaje" readonly>
              </div>
              <div class="col-md-3 col-2 align-self-center">
                <label for="in_realizado_2" class="col-form-label">Realizado Por:</label>
                <input type="text" class="form-control" id="in_realizado_2">
              </div>
              <div class="col-md-2 col-2 align-self-center" style="margin-top: 2.8%">
                <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal4"
                       style="width: 100%; height: 38px;" value="Firmar">
              </div>

              <div class="col-md-3 col-2 align-self-center">
                <label for="in_verificado_2" class="col-form-label">Verificado Por:</label>
                <input type="text" class="form-control" id="in_verificado_2">
              </div>
              <div class="col-md-2 col-2 align-self-center" style="margin-top: 2.8%">
                <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal5"
                       style="width: 100%; height: 38px;" value="Firmar">
              </div>
            </div>

            <div class="row justify-content-end mt-5" style="margin: 1%;text-align: right">
              <div class="col-md-12 col-2 align-self-end">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <!-- <button type="button" class="btn btn-primary" onclick="window.location.href = '/preparacion';">Aceptar -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalObservaciones">Aceptar
                </button>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </div>
</div>


<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../../assets/plugins/bootstrap/js/tether.min.js"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../html/vendor/datatables/datatables.min.js"></script>
<script src="html/vendor/bootstrap/js/popper.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../../html/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="../../html/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../../html/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="../../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="../../html/js/custom.min.js"></script>
<script src="../../html/vendor/jquery-confirm/jquery-confirm.min.js"></script>
<script src="../../html/js/datatables.js"></script>
<script src="../../html/js/utils/loadinfo-global.js"></script>
<script src="../../html/js/utils/pesajeinfo.js"></script>
<script src="../../html/js/validadores.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Toastr.js Después -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>
