<?php 
  include("modal/modal_firma.php"); 
  include("modal/modal_req_ajuste.php");
  include("modal/modal_observaciones.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Batch Record">
  <meta name="author" content="Teenus SAS">
  
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
  <title>Samara Cosmetics</title>
  
  <!-- Bootstrap Core CSS -->
  <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link href="../../html/css/style.css" rel="stylesheet">
  
  <!-- You can change the theme colors from here -->
  <link href="../../html/css/colors/blue.css" id="theme" rel="stylesheet">
  <link rel="stylesheet" href="../../html/css/custom.css">
  <link rel="stylesheet" type="text/css" href="../../html/vendor/datatables/datatables.min.css">
  <link rel="stylesheet" type="text/css"
        href="../../html/vendor/datatables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
  <!-- <script src="https://kit.fontawesome.com/6589be6481.js" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
</head>

<body class="fix-header fix-sidebar card-no-border">
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
  </div>
<div id="main-wrapper">
  
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
              <i class="large material-icons">account_circle</i></i></a>
              <!-- <i class="fas fa-chevron-circle-down"></i></a> -->
          <div class="dropdown-menu" aria-labelledby="dropdownMenuenlace">
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modalCambiarContrasena">Cambiar Contraseña</a>
            <a href="../index.html" class="dropdown-item">Cerrar Sesión</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>

  <div class="container-fluid">
  <div class="row page-titles">
      <div class="col-md-5 col-2 align-self-center">
        <h1 class="text-themecolor m-b-0 m-t-0"><b>Aprobación</b></h1>
      </div>
      <div class="col-md-3 col-4 align-self-center"></div>
      <div class="col-md-2 col-8 align-self-center"></div>
      <div class="col-md-2 col-2 align-self-center">
        <div class="container">
          <a href="../../preparacion" style="background-color:#fff;color:#FF8D6D" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down btn-md" role="button">Cola de Trabajo</a>
        </div>
      </div>
    </div>


    <!-- Modal -->
   <!--  <div class="modal fade" id="myModal2" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-md">
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
                <div class="col-md-12 col-2 align-self-center">
                  <label for="recipient-name" class="col-form-label">Usuario:</label>
                  <input type="text" class="form-control" id="usuario">
                </div>
                <div class="col-md-12 col-2 align-self-center">
                  <label for="recipient-name" class="col-form-label">Contraseña:</label>
                  <input type="text" class="form-control" id="contrasena">
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
  </div> -->

  <!-- Modal -->
  <!-- <div class="modal fade" id="myModal3" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form method="post" onsubmit="return enviar2();">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Firma QC/Supervisor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row page">
              <div class="col-md-12 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Usuario:</label>
                <input type="text" class="form-control" id="usuario2">
              </div>
              <div class="col-md-12 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Contraseña:</label>
                <input type="text" class="form-control" id="contrasena2">
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
</div> -->
<!-- Modal -->


<div class="row">
  <!-- column -->
  <div class="col-lg-12">
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link text-uppercase" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne" style="width: 100%">
              Información del producto
            </button>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            <div class="row" style="margin: 1%">

              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Fecha:</label>
                <input type="date" class="form-control" id="in_fecha" readonly>
              </div>
              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">No. Orden:</label>
                <input type="text" class="form-control" id="in_numero_orden" readonly>
              </div>
              <div class="col-md-4 col-2 align-self-right">
                <label for="recipient-name" class="col-form-label">Referencia:</label>
                <input type="text" class="form-control" id="in_referencia" readonly>
              </div>


            </div>
            <div class="row" style="margin: 1%">
              <div class="col-md-4 col-2 align-self-center">
                <label for="in_tamano_lote" class="col-form-label">Tamaño Lote:</label>
                <input type="text" class="form-control" id="in_tamano_lote"
                       readonly>
              </div>
              <div class="col-md-4 col-2 align-self-right">
                <label for="recipient-name" class="col-form-label">No. Lote:</label>
                <input type="text" class="form-control" id="in_numero_lote" readonly>
              </div>

              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Linea:</label>
                <input type="text" class="form-control" id="in_linea" readonly>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed text-uppercase" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo" style="width: 100%">
              Liberación control calidad fisioquimico para envasado
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <div class="row" style="margin: 1%">
              <div class="col-md-12 col-2 align-self-right">
                <h3 for="recipient-name" class="col-form-label"
                    style="text-align: center; background-color: #C0C0C0">Desinfección </h3>
              </div>
            </div>
            <div class="row" style="margin: 1%">
              <div class="col-md-4 col-2 align-self-right">
                <label for="sel_producto_desinfeccion" class="col-form-label">Producto de desinfección</label>
                <select class="selectpicker form-control" id="sel_producto_desinfeccion">
                  <option selected hidden></option>
                </select>
              </div>
              <div class="col-md-8 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Observaciones:</label>
                <input type="text" class="form-control" id="recipient2-name">
              </div>
            </div>
            <div class="row" style="margin: 1%">
              <div class="col-md-4 col-2 align-self-center">
                <label for="in_realizado" class="col-form-label">Realizado Por:</label>
                <input type="text" class="form-control" id="in_realizado">
              </div>
              <div class="col-md-2 col-2 align-self-center" style="margin-top: 2.8%">
                <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2"
                       style="width: 100%; height: 38px;" value="Firmar">
              </div>

              <div class="col-md-4 col-2 align-self-center">
                <label for="in_verificado" class="col-form-label">Verificado Por:</label>
                <input type="text" class="form-control" id="in_verificado">
              </div>
              <div class="col-md-2 col-2 align-self-center" style="margin-top: 2.8%">
                <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal3"
                       style="width: 100%; height: 38px;" value="Firmar">
              </div>
            </div>
          </div>
          <div class="row" style="margin: 1%">
            <div class="col-md-12 col-2 align-self-center">
              <h3 for="recipient-name" class="col-form-label"
                  style="text-align: center; background-color: #c0c0c0">
                Control de proceso</h3>
            </div>
            <div class="col-md-12 col-2 align-self-center">
              <div class="card">
                <div class="card-block">
                  <!--<h4 class="card-title">Basic Table</h4>
                 <h6 class="card-subtitle">Add class <code>.table</code></h6>-->
                  <div class="table-responsive">

                    <table class="table table-striped table-bordered">
                      <thead>
                      <tr>
                        <th>Parametros</th>
                        <th>Especificaciones</th>
                        <th>Resultados</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>Color</td>
                        <td id="espec_color">Especificacion del area</td>
                        <td><select class="selectpicker form-control">
                          <option selected hidden></option>
                          <option>Cumple</option>
                          <option>No cumple</option>
                          <option>No aplica</option>
                        </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Olor</td>
                        <td id="espec_olor">Especificacion del area</td>
                        <td><select class="selectpicker form-control">
                          <option selected hidden></option>
                          <option>Cumple</option>
                          <option>No cumple</option>
                          <option>No aplica</option>
                        </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Apariencia</td>
                        <td id="espec_apariencia">Especificacion del area</td>
                        <td><select class="selectpicker form-control">
                          <option selected hidden></option>
                          <option>Cumple</option>
                          <option>No cumple</option>
                          <option>No aplica</option>
                        </select>
                        </td>
                      </tr>
                      <tr>
                        <td>PH</td>
                        <td id="espec_ph">Especificacion del area</td>
                        <td><input type="number" id="in_ph" class="selectpicker form-control">
                        </td>
                      </tr>
                      <tr>
                        <td>Viscocidad CPS</td>
                        <td id="espec_viscidad">Especificacion del area</td>
                        <td><input type="number" class="selectpicker form-control" id="in_viscocidad">
                        </td>
                      </tr>
                      <tr>
                        <td>Densidad o gravedad especifica G/ML</td>
                        <td id="espec_densidad">Especificacion del area</td>
                        <td><input class="selectpicker form-control" type="number" id="in_densidad">
                        </td>
                      </tr>
                      <tr>
                        <td>Untuosidad</td>
                        <td id="espec_untosidad">Especificacion del area</td>
                        <td><select class="selectpicker form-control">
                          <option selected hidden></option>
                          <option>Cumple</option>
                          <option>No cumple</option>
                          <option>No aplica</option>
                        </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Poder Espumoso</td>
                        <td id="espec_poder_espumoso">Especificacion del area</td>
                        <td><select class="selectpicker form-control">
                          <option selected hidden></option>
                          <option>Cumple</option>
                          <option>No cumple</option>
                          <option>No aplica</option>
                        </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Grado Alcohol</td>
                        <td id="espec_grado_alcohol">Especificacion del area</td>
                        <td><input class="selectpicker form-control" type="number" id="in_grado_alcohol">
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <hr>
          <div class="row" style="margin: 1%">
            <button type="button" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"
                    data-toggle="modal" data-target="#modalAjuste" style="margin-left: 1%">¿Se requiere algún ajuste?
            </button>
          </div>
          <hr>
          <div class="row" style="margin: 1%">
            <div class="col-md-12 col-2 align-self-center" style="margin-left: 85%">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <!-- <button type="button" class="btn btn-primary"
                      onclick="window.location.href = '../html/envasado.html';">Aceptar -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalObservaciones">Aceptar</button>
            </div>
          </div>
        </div>


      </div>

    </div>
  </div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->


<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../../assets/plugins/bootstrap/js/tether.min.js"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../html/vendor/datatables/datatables.min.js"></script>
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
<script src="../../html/js/datatables.js"></script>
<script src="../../html/js/utils/loadinfo-global.js"></script>
<script src="../../html/js/utils/aprobacioninfo.js"></script>
</body>

</html>
