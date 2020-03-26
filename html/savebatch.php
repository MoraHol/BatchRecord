
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

$update = false;

if (isset($_POST['save'])) {

		$norefenrencia = $_POST['norefenrencia'];
		$nombrereferencia = $_POST['nombrereferencia'];
		$nombreproducto = $_POST['nombreproducto'];
		$notificacionsanitaria = $_POST['notificacionsanitaria'];
		$linea = $_POST['linea'];
		$marca = $_POST['marca'];
		$propietario = $_POST['propietario'];
		$presentacion = $_POST['presentacion'];
		$norefenrencia = $_POST['norefenrencia'];
		$fechahoy = $_POST['fechahoy'];
		$fechaprogramacion = $_POST['fechaprogramacion'];
		$numerodelote = $_POST['numerodelote'];
		$tamañototallote = $_POST['tamañototallote'];
		$tamañolotepresentacion = $_POST['tamañolotepresentacion'];
		$unidadesxlote = $_POST['unidadesxlote'];
		

		mysqli_query($conn, "INSERT INTO batch (numero_orden, fecha_hoy, fecha_programacion, numero_lote, tamano_lote, tamano_lote_presentacion, unidades_x_lote, nombre_referencia,  notificacion_sanitaria, id_linea, id_marca, id_propietario, id_presentacion, id_producto) VALUES ('$norefenrencia', '$fechahoy', '$fechaprogramacion', '$numerodelote','$tamañototallote', '$tamañolotepresentacion', '$unidadesxlote', '$nombrereferencia', '$notificacionsanitaria', '$linea', '$marca', '$propietario', '$presentacion', '$nombreproducto')");
		$_SESSION['message'] = "Address saved"; 

		header('location: crear-batch.php');
	}


//update

	if (isset($_POST['update'])) {

		$idbatch = $_POST['idbatch'];
		$norefenrencia = $_POST['norefenrencia'];
		$nombrereferencia = $_POST['nombrereferencia'];
		$nombreproducto = $_POST['nombreproducto'];
		$notificacionsanitaria = $_POST['notificacionsanitaria'];
		$linea = $_POST['linea'];
		$marca = $_POST['marca'];
		$propietario = $_POST['propietario'];
		$presentacion = $_POST['presentacion'];
		$fechahoy = $_POST['fechahoy'];
		$fechaprogramacion = $_POST['fechaprogramacion'];
		$numerodelote = $_POST['numerodelote'];
		$tamañototallote = $_POST['tamañototallote'];
		$tamañolotepresentacion = $_POST['tamañolotepresentacion'];
		$unidadesxlote = $_POST['unidadesxlote'];

	$modify = mysqli_query($conn, "UPDATE batch SET numero_orden='$norefenrencia', fecha_hoy='$fechahoy', fecha_programacion='$fechaprogramacion', numero_lote='$numerodelote', tamano_lote='$tamañototallote', tamano_lote_presentacion='$tamañolotepresentacion', unidades_x_lote='$unidadesxlote', nombre_referencia='$nombrereferencia', notificacion_sanitaria='$notificacionsanitaria', id_linea='$linea', id_marca='$marca', id_propietario='$propietario', id_presentacion='$presentacion', id_producto='$nombreproducto' WHERE id_batch=$idbatch");
	$_SESSION['message'] = "Address updated!"; 
	header('location: crear-batch.php');


}

if (isset($_GET['del'])) {
	$idbatch = $_GET['del'];

	mysqli_query($conn, "DELETE FROM batch WHERE id_batch=$idbatch");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: crear-batch.php');

}

 ?>
 
