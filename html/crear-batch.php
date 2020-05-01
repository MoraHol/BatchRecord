<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <link href="css/colors/blue.css" id="theme" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.min.css">
  <link rel="stylesheet" href="vendor/jquery-confirm/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/datatables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://kit.fontawesome.com/6589be6481.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/custom.css">
  <style type="text/css">.tcrearBatch {color:#fff;}

</style>

  <?php
    require('savebatch.php');
    $idbatch = "";
    $edit = false;
    $sql5 = mysqli_query($conn, "SELECT * From producto");
    $sql6 = mysqli_query($conn, "SELECT * FROM producto INNER JOIN batch ON batch.id_producto = producto.referencia INNER JOIN linea ON producto.id_linea = linea.id INNER JOIN propietario ON producto.id_propietario = propietario.id INNER JOIN presentacion_comercial ON producto.id_presentacion_comercial = presentacion_comercial.id");
    if (isset($_GET['edit'])) {
      $idbatch = $_GET['edit'];
      $update = true;
      $record = mysqli_query($conn, "SELECT * FROM producto INNER JOIN batch ON batch.id_producto = producto.referencia WHERE id_batch=$idbatch");


      $edit = true;
      $n = mysqli_fetch_array($record);
      $norefenrencia = $n['referencia'];
      $nombrereferencia = $n['nombre_referencia'];
      $nombreproducto = $n['id_nombre_producto'];
      $notificacionsanitaria = $n['id_notificacion_sanitaria'];
      $linea = $n['id_linea'];
      $marca = $n['id_marca'];
      $propietario = $n['id_propietario'];
      $presentacion = $n['id_presentacion_comercial'];
      $fechahoy = $n['fecha_creacion'];
      $fechaprogramacion = $n['fecha_programacion'];
      $numerodelote = $n['numero_lote'];
      $tamanototallote = $n['tamano_lote'];
      $tamanolotepresentacion = $n['lote_presentacion'];
      $unidadesxlote = $n['unidad_lote'];
      $estado = $n["estado"];

    }
  ?>
  <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script type="text/javascript">
      $(function () {
          $('#tamanototallote, #tamanolotepresentacion').keyup(function () {
              var value1 = parseFloat($('#tamanototallote').val()) || 0;
              var value2 = parseFloat($('#tamanolotepresentacion').val()) || 0;
              $('#unidadesxlote').val(value1 / value2);
          });
      });

      function cargarreferencia() {
          $('#name-submit').click();
      }
  </script>
</head>
<body class="fix-header fix-sidebar card-no-border">

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
          <span><img src="../assets/images/logo-light-text2.png" class="light-logo" alt="homepage"/></span>
        </a>
      </div>
      <div class="navbar-collapse">
        <ul class="navbar-nav mr-auto mt-md-0">
          <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
              href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
        </ul>
        <ul class="navbar-nav my-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="true" id="dropdownMenuenlace">Berney Montoya 
               <i class="fas fa-chevron-circle-down"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuenlace">
              <a href="#" class="dropdown-item">Cambiar contraseña</a>
              <a href="../index.html" class="dropdown-item">Cerrar sesión</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
 
  <div class="row page-titles">
    <div class="col-md-5 col-2 align-self-right">
      <h1 class="text-themecolor m-b-0 m-t-0" style="margin-left: 7%"><b>Batch Record</b></h1>
    </div>
    <div class="col-md-3 col-4 align-self-center">
 
    </div>
    <div class="col-md-4 col-2 align-self-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-2"><button type="button" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down btn-md"
                  data-toggle="modal" data-target="#filtrado">Filtrar</button>
          </div>
          <div class="col-lg-8"><button type="button" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down btn-md"
                  data-toggle="modal" data-target="#myModal">Crear Batch Record</button>
                  <!-- <a href="#addProductModal" class="btn btn-success" data-toggle="modal"> <span>Crear Batch Record</span></a> -->
          </div>
        </div>

        <div class="modal" tabindex="-1" id="filtrado" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><strong>Filtrado por Fechas</strong></h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button> -->
              </div>
              <div class="modal-body">
            <!-- Default unchecked -->
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="defaultUnchecked" name="defaultExampleRadios">
                  <label class="custom-control-label" for="defaultUnchecked">Fecha de Creación</label>
                </div>

                <!-- Default checked -->
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" checked>
                  <label class="custom-control-label" for="defaultChecked">Fecha Programación</label>
                </div>
              
                <div class="col-md-12 col-2 align-self-center">
                  <label for="recipient-name" class="col-form-label"><strong>Fecha Inicial</strong></label>
                  <input type="date" class="form-control" id="fecha" name="fechaprogramacion" value="<?= $fechaprogramacion; ?>" max="<?php $hoy = date("Y-m-d"); echo $hoy; ?>">
                  <label for="recipient-name" class="col-form-label"><strong>Fecha Final</strong></label>
                  <input type="date" class="form-control" id="fecha" name="fechaprogramacion" value="<?= $fechaprogramacion; ?>" max="<?php $hoy = date("Y-m-d"); echo $hoy; ?>">  
                  </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Aceptar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </div>
        </div>


        <div class="modal fade" id="myModal" role="dialog" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header" style="  background-color: #FF8D6D !important;">
                <h5 class="modal-title" id="exampleModalLabel"><span class="tcrearBatch"><b>Crear Batch Record</b></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="savebatch.php" onsubmit="return onSubmit();" id="form-submit-batch"
                      method="post" autocomplete="off">
                  <input type="hidden" name="idbatch" value="<?= $idbatch; ?>">
                  <div class="row page">
                    <div class="col-md-12 col-2 align-self-center">

                      <?php if ($update == false): ?>
                        <label for="recipient-name" class="col-form-label">No. Referencia:</label>
                        <select class="form-control " name="norefenrencia" id="name" required
                                onchange="cargarData()"
                                value="<?= $norefenrencia; ?>">
                          <option value="<?= $norefenrencia; ?>">Seleccione...</option>
                          <?php
                            while ($row = mysqli_fetch_array($sql5)) {
                              echo "<option value='" . $row['referencia'] . "'>" . $row['referencia'] . "</option>";
                            }
                          ?>
                        </select>
                      <?php else: ?>
                        <label for="recipient-name" class="col-form-label">No. Referencia:</label>
                        <select class="form-control " name="norefenrencia" id="name"
                                required
                                onchange="cargarData()"
                                value="<?= $norefenrencia; ?>">

                          <?php
                            while ($row = mysqli_fetch_array($sql5)) { ?>
                              <option
                                value='<?= $row['referencia'] ?>' <?= $row['referencia'] == $norefenrencia ? "selected" : "" ?>> <?= $row['referencia'] ?></option>
                              <?php
                            }
                          ?>
                        </select>
                      <?php endif ?>
                    </div>
                    <div class="col-md-2 col-2 align-self-center d-none">
                      <input type="button" class="btn btn-primary" id="name-submit"
                             style="margin-top: 43%; background-color: #FF8D6D !important; border:#FF8D6D !important "
                             value="Cargar">
                    </div>
                  </div>
                  <div class="row page">
                    <div class="col-md-6 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Nombre Referencia</label><br>
                      <input id="name-data" class="displayallinfo" readonly name="nombrereferencia">
                    </div>
                    <div class="col-md-6 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Marca</label>
                      <input id="name-data2" class="displayallinfo" readonly name="marca">
                    </div>
                  </div>

                  <input type="text" name="fechahoy" value="<?= date('Y-m-d'); ?>" readonly class="form-control datepicker" hidden>
                  <div class="row page">
                    <div class="col-md-6 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Notificación Sanitaria</label>
                      <input id="name-data3" class="displayallinfo" readonly name="notificacionsanitaria"
                      >
                    </div>
                    <div class="col-md-6 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Propietario</label>
                      <input id="name-data4" class="displayallinfo" readonly name="propietario">
                    </div>
                  </div>
                  <div class="row page">
                    <div class="col-md-6 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Nombre Producto</label>
                      <input id="name-data5" class="displayallinfo" readonly name="nombreproducto" value="">
                    </div>
                    <div class="col-md-6 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Presentación Comercial</label>
                      <input id="name-data6" class="displayallinfo" readonly name="presentacion" readonly
                             value="">
                    </div>
                  </div>
                  <div class="row page">

                    <?php if ($update == false): ?>
                      <div class="col-md-6 col-2 align-self-center d-none">
                        <label for="recipient-name" class="col-form-label">Estado</label><br>
                        <select class="selectpicker form-control" id="filtrar1" name="numerodelote" style="width: 80%">
                          <option value="0">Detenido</option>
                          <option value="1">Activo</option>
                        </select>
                      </div>
                    <?php else: ?>
                      <div class="col-md-6 col-2 align-self-center">
                        <label for="recipient-name" class="col-form-label">Estado</label><br>
                        <select class="selectpicker form-control" id="filtrar1" name="numerodelote" style="width: 80%" value="<?= $estado; ?>">
                          <option value="0">Detenido</option>
                          <option value="1">Activo</option>
                          <option value="2">En proceso</option>
                        </select>
                      </div>
                    <?php endif ?>

                    <div class="col-md-6 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Linea</label>
                      <input id="name-data7" class="displayallinfo" readonly name="linea" readonly>
                    </div>
                  </div>
                  <div class="row page">
                    <div class="col-md-4 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Unidades por Lote</label>
                      <input type="number" name="unidadesxlote" id="unidadesxlote" class="form-control" min="1" value="<?= $unidadesxlote; ?>" required/>
                    </div>
                    <div class="col-md-4 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Tamaño del Lote</label>
                      <input type="number" name="tamanototallote" id="tamanototallote" class="form-control" min="1" readonly value="<?= $tamanototallote; ?>" />
                    </div>
                    <div class="col-md-4 col-2 align-self-center d-none">
                      <label for="recipient-name" class="col-form-label">Tamaño del Lote por Presentación</label>
                      <input type="number" name="tamanolotepresentacion" id="tamanolotepresentacion"
                             class="form-control" min="1" value="<?= $tamanolotepresentacion; ?>" required/>
                    </div>
                  </div>
                  <div class="row page">
                    <div class="col-md-6 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Fecha de Programación</label>
                      <input type="date" class="form-control" id="fecha" name="fechaprogramacion"
                             value="<?= $fechaprogramacion; ?>"
                             min="<?php $hoy = date("Y-m-d");
                               echo $hoy; ?>">
                    </div>
                    <div class="col-md-6 col-2 align-self-center">
                      <button type="button"
                              class="btn waves-effect waves-light btn-danger pull-center"
                              data-toggle="modal" data-target="#myModal4" data-dismiss="modal"
                              aria-label="Close" style="width: 80%; margin-top: 12%">Clonar Batch
                      </button>
                    </div>
                  </div>
                  <div class="row page">
                    <div class="col-md-12 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Observaciones Pesaje</label>
                      <input type="text" class="form-control" id="recipient-name" name="autoriza"
                             required>
                    </div>
                  </div>
                  <div class="row page">
                    <div class="col-md-12 col-2 align-self-center">
                      <label for="recipient-name" class="col-form-label">Observaciones Preparación</label>
                      <input type="text" class="form-control" id="recipient-name" name="autoriza"
                             required>
                    </div>
                  </div>
                  <div class="modal-footer">

                    <?php if ($update == false): ?>
                      <button type="submit" class="btn btn-primary" name="save">Crear</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancelar
                      </button>
                    <?php else: ?>
                      <button type="submit" class="btn btn-primary" name="update">Modificar
                      </button>
                      <script type="text/javascript">
                          $(window).on('load', function () {
                              $('#myModal').modal('show');
                          });
                      </script>
                    <?php endif ?>

                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Presentación envasado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row page">
              <div class="col-md-5 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Total Kilos:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="col-md-5 col-2 align-self-center">
                <table class="table">
                  <thead>
                  <tr>
                    <th>Referencia</th>
                    <th>Presentación</th>
                    <th>Cantidad KG</th>
                    <th>Unidades</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><select class="selectpicker form-control">
                        <option selected hidden></option>
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                      </select>
                    </td>
                    <td><select class="selectpicker form-control">
                        <option selected hidden></option>
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                      </select>
                    </td>
                    <td><input type="text" class="form-control" id="cantidad"></td>
                    <td><input type="text" class="form-control" id="unidades"></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="row page">
              <div class="col-md-5 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Numero de presentaciones:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>

            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Orden de suministro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row page">
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
                  <tr>
                    <td><input type="text" class="form-control" id="pesogrs" value="01" readonly></td>
                    <td><input type="text" class="form-control" id="pesogrs" value="Materia01"readonly></td>
                    <td><input type="text" class="form-control" id="pesogrs"></td>
                  </tr>
                </table>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal4" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" ><strong>Clonar Batch Record</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
                          
          <form>
            <div class="row page">
              <div class="col-md-12 col-2 align-self-center">
                <table class="table">
                  <thead>
                  <tr>
                    <th>Unidades</th>
                    <td><input type="text" class="form-control" id="tamaño"></td>
                    <th>Presentación</th>
                    <th>Cantidad</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><input type="text" class="form-control" id="tamaño"></td>
                    <td><input type="text" class="form-control" id="cantidadbatch"></td>
                    <td><input type="text" class="form-control" id="tamañototal"></td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- <div class="row page">
              <div class="col-md-4 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label">Total Batch Record:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
            </div> -->
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- column -->
  <div class="col-md-12 col-2 align-self-right">
    <div class="card">
      <div class="card-block">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="example">
            <thead>
            <tr>
              <th></th>

              <th>Orden</th>
              <th>Referencia</th>
              <th>Nombre</th>
              <th>Presentacion</th>
              <th>Lote</th>
              <th>Linea</th>
              <th>Propietario</th>
              <th>Fecha Creación</th>
              <th>Fecha Programación</th>
              <th>Estado</th>

              <th></th>
              <th></th>

            </tr>
            </thead>
            <tbody>

            <?php
              while ($rows = mysqli_fetch_assoc($sql6)) {
                ?>
                <tr>
                  <td><input type="radio" id='express' name="optradio" value="<?= $rows['id_batch']; ?>"></td>
                  <td><?= $rows['numero_orden']; ?></td>
                  <td><?= $rows['referencia']; ?></td>
                  <td><?= $rows['nombre_referencia']; ?></td>
                  <td><?= $rows['presentacion']; ?></td>
                  <td><?= $rows['numero_lote'] ?></td>
                  <td><?= $rows['nombre_linea']; ?></td>
                  <td><?= $rows['nombre']; ?></td>
                  <td><?= $rows['fecha_creacion']; ?></td>
                  <td><?= $rows['fecha_programacion']; ?></td>
                  <td><?= $rows['estado'] == 1 ? "Activo" : "Inactivo" ?></td>

                  <td><a href="crear-batch.php?edit=<?= $rows ['id_batch']; ?>"
                         class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar" style="color:rgb(255, 193, 7)">&#xE254;</i></a></td>
                  <td><a href="#" onclick="deleteBatch(event)" attr-id="<?= $rows ['id_batch']; ?>"
                        class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar" style="color:rgb(234, 67, 54)">&#xE872;</i></a></td>
                </tr>
                <?php
              }
            ?>
            </tbody>
          </table>
          <div id="result"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="vendor/datatables/datatables.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/waves.js"></script>
<script type="text/javascript">
    $(function () {
        var $src = $('#tamanototallote'),
            $dst = $('#tamanolotepresentacion');
        $src.on('input', function () {
            $dst.val($src.val());
        });
    });
</script>
<script type="text/javascript">
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var est = parseInt($('#est').val(), 10);
            var max = parseInt($('#est').val(), 10);
            var age = parseFloat(data[10]) || 0; // use data for the age column
            if ((isNaN(est) && isNaN(max)) ||
                (isNaN(est) && age <= max) ||
                (est <= age && isNaN(max)) ||
                (est <= age && age <= max)) {
                return true;
            }
            return false;
        }
    );
    $(document).ready(function () {
        var table = $('#example').DataTable(
            {
                columnDefs: [
                    {
                        targets: [4],
                        render: (data, type, row) => {
                            return $.number(data, 0, ',', '.')
                        }
                    }
                ]
            }
        );
        table.destroy();
        $('#est').keyup(function () {
            table.draw();
        });
    });
</script>
<script>
    function displayRadioValue() {
        var ele = document.getElementsByName('optradio');

        for (i = 0; i < ele.length; i++) {
            if (ele[i].checked)
                document.getElementById("result").innerHTML
                    = "you Gender: " + ele[i].value;
        }
    }
</script>

<script src="js/sidebarmenu.js"></script>
<script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="../assets/plugins/jquery/jquery.number.min.js"></script>
<!--Custom JavaScript -->
<script src="js/global.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/datatables.js"></script>
<script src="vendor/jquery-confirm/jquery-confirm.min.js"></script>

<?php if ($update) { ?>
  <script>cargarData()</script>
<?php } ?>
<script>
    $('#tamanototallote').number(true, 0, ',', '.');

    $('#tamanototallote').change(function () {
        $('#unidadesxlote').val($(this).val() / $('#name-data6').val());
        $('#unidadesxlote').number(true, 2, ',', '.');
    });

    function onSubmit() {
        let fecha = $('#fecha').val()
        if (fecha !== '') {
            $('#filtrar1').val(1);
        } else {
            $('#filtrar1').val(0);
        }

        $('#tamanolotepresentacion').val($('#name-data6').val())
        console.log($('#form-submit-batch').serialize());
        return true;
    }

    function deleteBatch(event) {
        let id = $(event.target).attr('attr-id');
        $.confirm({
            title: 'Eliminar Registro',
            content: '¿Seguro que quiere eliminar este Batch Record?',
            buttons: {
                Si: function () {
                    $.ajax({
                        url: `savebatch.php?del=${id}`,
                        type: 'GET'
                    }).done((data, status, xhr) => {
                        location.reload();
                    });

                },
                No: function () {
                }
            }
        });
    }
</script>
</body>
</html>