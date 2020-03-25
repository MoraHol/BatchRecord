
  <?php 

require('../conexion.php');
		$norefenrencia = "";
		$nombrereferencia = "";
		$nombreproducto = "";
		$notificacionsanitaria ="";
		$linea = "";
		$marca = "";
		$propietario = "";
		$presentacion ="";
		$norefenrencia ="";
		$fechahoy = "";
		$fechaprogramacion ="";
		$numerodelote = "";
		$tamañototallote = "";
		$tamañolotepresentacion = "";
		$unidadesxlote = "";
		$idbatch = "0";

$edit_state = false;


if (isset($_POST['save'])) {

		$norefenrencia = mysqli_real_escape_string($conn, $_POST['norefenrencia']);
		$nombrereferencia = mysqli_real_escape_string($conn, $_POST['nombrereferencia']);
		$nombreproducto = mysqli_real_escape_string($conn, $_POST['nombreproducto']);
		$notificacionsanitaria = mysqli_real_escape_string($conn, $_POST['notificacionsanitaria']);
		$linea = mysqli_real_escape_string($conn, $_POST['linea']);
		$marca = mysqli_real_escape_string($conn, $_POST['marca']);
		$propietario = mysqli_real_escape_string($conn, $_POST['propietario']);
		$presentacion = mysqli_real_escape_string($conn, $_POST['presentacion']);
		$norefenrencia = mysqli_real_escape_string($conn, $_POST['norefenrencia']);
		$fechahoy = mysqli_real_escape_string($conn, $_POST['fechahoy']);
		$fechaprogramacion = mysqli_real_escape_string($conn, $_POST['fechaprogramacion']);
		$numerodelote = mysqli_real_escape_string($conn, $_POST['numerodelote']);
		$tamañototallote = mysqli_real_escape_string($conn, $_POST['tamañototallote']);
		$tamañolotepresentacion = mysqli_real_escape_string($conn, $_POST['tamañolotepresentacion']);
		$unidadesxlote = mysqli_real_escape_string($conn, $_POST['unidadesxlote']);
		


$sql = "INSERT INTO batch (numero_orden, fecha_hoy, fecha_programacion, numero_lote, tamano_lote, tamano_lote_presentacion, unidades_x_lote, nombre_referencia,  notificacion_sanitaria, id_linea, id_marca, id_propietario, id_presentacion, id_producto) VALUES ('$norefenrencia', '$fechahoy', '$fechaprogramacion', '$numerodelote','$tamañototallote', '$tamañolotepresentacion', '$unidadesxlote', '$nombrereferencia', '$notificacionsanitaria', '$linea', '$marca', '$propietario', '$presentacion', '$nombreproducto')";

$resul = mysqli_query($conn,$sql); // call 2nd query
	header('location: crear-batch.php');
	}


//update

	if (isset($_POST['update'])) {

		$norefenrencia = mysqli_real_escape_string($conn, $_POST['norefenrencia']);
		$nombrereferencia = mysqli_real_escape_string($conn, $_POST['nombrereferencia']);
		$nombreproducto = mysqli_real_escape_string($conn, $_POST['nombreproducto']);
		$notificacionsanitaria = mysqli_real_escape_string($conn, $_POST['notificacionsanitaria']);
		$linea = mysqli_real_escape_string($conn, $_POST['linea']);
		$marca = mysqli_real_escape_string($conn, $_POST['marca']);
		$propietario = mysqli_real_escape_string($conn, $_POST['propietario']);
		$presentacion = mysqli_real_escape_string($conn, $_POST['presentacion']);
		$norefenrencia = mysqli_real_escape_string($conn, $_POST['norefenrencia']);
		$fechahoy = mysqli_real_escape_string($conn, $_POST['fechahoy']);
		$fechaprogramacion = mysqli_real_escape_string($conn, $_POST['fechaprogramacion']);
		$numerodelote = mysqli_real_escape_string($conn, $_POST['numerodelote']);
		$tamañototallote = mysqli_real_escape_string($conn, $_POST['tamañototallote']);
		$tamañolotepresentacion = mysqli_real_escape_string($conn, $_POST['tamañolotepresentacion']);
		$unidadesxlote = mysqli_real_escape_string($conn, $_POST['unidadesxlote']);
		$idbatch  = mysqli_real_escape_string($conn, $_POST['idbatch']);

		}

 ?>
 
