<?php 
  include('./modal/modalDespejedeLinea.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Samara Cosmetics | Despeje de Linea</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  
  <!-- Datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

  <!-- Alertify -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>  

</head>

<body class="">
  <div class="wrapper ">
   
    <?php include('./admin_componentes/sidebar.php'); ?>

    <div class="main-panel" id="main-panel">
      <?php include('./admin_componentes/navegacion.php'); ?>
      <div class="panel-header panel-header-sm"></div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> <strong>Despeje de Linea de los Procesos</strong></h4>
                <!-- <a class="btn btn-primary" href="crearUsuarios.php" role="button">Crear Parametro</a> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDespejedeLinea">Crear Parametro</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="listarDespeje" class="table-striped row-borde" style="width:100%">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Parametro de Control</th>
                        <th>Respuesta</th>
                        <!--<th>No</th> -->
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                  </table>      
                </div>
              </div>
            </div>
          </div>      
        </div>
      </div>                
      <?php include('./admin_componentes/footer.php'); ?>
    </div>
  </div>
  
  
  
  <!--   Core JS Files   -->
  <!-- <script src="../assets/js/core/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
 
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
 
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script> --><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <!-- <script src="../assets/demo/demo.js"></script> -->

  <!-- Alertify -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <!-- javascript inicializacion datatables -->
  <script src="/admin/sistema/js/despejedelinea.js"></script>

  </body>

</html>