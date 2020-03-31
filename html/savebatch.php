
  <?php 

require('../conexion.php');
		$norefenrencia = "";
		$fechahoy = "";
		$fechaprogramacion = "";
		$numerodelote = "";
		$tamañototallote = "";
		$tamañolotepresentacion = "";
		$unidadesxlote = "";

$update = false;


if (isset($_POST['save'])) {		

		$norefenrencia = $_POST['norefenrencia'];
		$fechahoy = $_POST['fechahoy'];
		$fechaprogramacion = $_POST['fechaprogramacion'];
		$numerodelote = $_POST['numerodelote'];
		$tamañototallote = $_POST['tamañototallote'];
		$tamañolotepresentacion = $_POST['tamañolotepresentacion'];
		$unidadesxlote = $_POST['unidadesxlote'];
		
		$create = mysqli_query($conn, "INSERT INTO batch (fecha_creacion, fecha_programacion, fecha_actual, numero_orden, numero_lote, tamano_lote, lote_presentacion, unidad_lote, estado, id_producto) 
			VALUES ('$fechahoy', '$fechaprogramacion', '$0000-00-00', 'OP012020',' X0010320', '$tamañototallote', '$tamañolotepresentacion', '$unidadesxlote', '$numerodelote', '$norefenrencia')");

	header('location: crear-batch.php');	
	}
//update

	if (isset($_POST['update'])) {

		$idbatch = $_POST['idbatch'];
		$norefenrencia = $_POST['norefenrencia'];
		$fechahoy = $_POST['fechahoy'];
		$fechaprogramacion = $_POST['fechaprogramacion'];
		$numerodelote = $_POST['numerodelote'];
		$tamañototallote = $_POST['tamañototallote'];
		$tamañolotepresentacion = $_POST['tamañolotepresentacion'];
		$unidadesxlote = $_POST['unidadesxlote'];
		

	$modify = mysqli_query($conn, "UPDATE batch SET fecha_creacion='$fechahoy', fecha_programacion='$fechaprogramacion', numero_orden='OP".$idbatch."2020', numero_lote='X0".$idbatch."20', tamano_lote='$tamañototallote', lote_presentacion='$tamañolotepresentacion', unidad_lote='$unidadesxlote', estado='1',  id_producto='$norefenrencia' WHERE id_batch=$idbatch");
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
 
