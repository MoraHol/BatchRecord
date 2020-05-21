<?php 
	include('./html/modal/modal_recuperarClave.php');
	session_start();

	if(!empty($_SESSION['active'])){
		header('location: html/crear-batch.php');
	}else{
		$alert = '';
		if(!empty($_POST)){
			if(empty($_POST['email']) or empty($_POST['clave'])){
				$alert="Ingrese su usuario y password";
				//echo '<script>alertify.error("Ingrese su usuario y password.");</script>';
				//echo '<script>alertify.set("notifier","position", "top-right"); alertify.success("Agregado con éxito.");</script>';
				//'<script>swal("Hello world!");</script>';
			}else{
				require_once('./conexion.php');
				$email = mysqli_real_escape_string($conn,$_POST['email']); 
				$pass = md5(mysqli_real_escape_string($conn,$_POST['clave']));
				
				$query = mysqli_query($conn, "SELECT * FROM usuario WHERE email ='$email' AND clave='$pass'");
				$result = mysqli_num_rows($query);

				if($result>0){
					$data= mysqli_fetch_array($query);
					$_SESSION['active']=true;
					$_SESSION['idUser']=$data['id'];
					$_SESSION['nombre']=$data['nombre'];
					$_SESSION['apellido']=$data['apellido'];
					$_SESSION['email']=$data['email'];
					$_SESSION['idModulo']=$data['id_modulo'];
					$_SESSION['cargo']=$data['id_cargo'];
					
					header('location: html/crear-batch.php');
				}else{
					$alert="El usuario o la contraseña no son validos";
					/* echo '<script>alertify.set("notifier","position", "top-right"); alertify.error("EL usuario o la clave son incorrectos.");</script>'; */
					session_destroy();
				}
				
			}
		}
	}	
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Batch Record">
	<meta name="author" content="Teenus SAS">
    <title>Samara Cosmetics</title>

	
	<!-- Bootstrap Core CSS -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="/html/css/sesion.css" rel="stylesheet">

	<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="html/vendor/datatables/datatables.min.css">
	<link rel="stylesheet" href="html/vendor/jquery-confirm/jquery-confirm.min.css">
	<link rel="stylesheet" type="text/css" href="html/vendor/datatables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Alertify -->
  	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>  


</head>

<body class="text-center">
	<form class="form-signin" action="" method="POST">
		<img class="mb-4" src="/assets/images/logo-light-text2.png" alt="" width="200" height="100">
		<h1 class="h3 mb-3 font-weight-normal" style="color:slategrey">Iniciar Sesión</h1><br>
		<input type="text" name="email" class="form-control mb-3" placeholder="Usuario" autofocus>
		<input type="password" name="clave" class="form-control" placeholder="Contraseña">
		
		<div class="mb-3">
			<div class="form-check">
    			<input type="checkbox" class="form-check-input" id="Adminchecked">
    				<label class="form-check-label" for="Adminchecked">Administrador</label>
			</div>
			<a href="" data-toggle="modal" data-target="#ModalRecuperarClave">Recuperar Contraseña</a>
		</div>
		
		<button class="btn btn-lg btn-success btn-block mb-3" type="submit">Iniciar</button><!-- onclick="window.location='/html/crear-batch.php'" -->
		<div class=""></div>
		<div class="alert alert-danger mb" role="alert"> <?php echo isset($alert) ? $alert :''; ?> </div>
		<p class="mt-5 mb-3 text-muted">&copy; 2020</p>
	</form>

	<script src="html/vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="html/vendor/bootstrap/js/popper.js" type="text/javascript"></script>
	<script src="html/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> -->
	<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>

	

</html>