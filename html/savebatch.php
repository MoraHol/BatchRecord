
  <?php 

require('../conexion.php');
		$norefenrencia = "";
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
		$fechahoy = $_POST['fechahoy'];
		$fechaprogramacion = $_POST['fechaprogramacion'];
		$numerodelote = $_POST['numerodelote'];
		$tamañototallote = $_POST['tamañototallote'];
		$tamañolotepresentacion = $_POST['tamañolotepresentacion'];
		$unidadesxlote = $_POST['unidadesxlote'];
		

		$create = mysqli_query($conn, "INSERT INTO batch (fecha_creacion, fecha_programacion, fecha_actual, numero_orden, numero_lote, tamano_lote, lote_presentacion, unidad_lote, estado, id_producto) 
			VALUES ('000-00-00', '000-00-00','0000-00-00', '77','77','77', '87', '1', 0, '1')");
		



if ($conn->query($create) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $create . "<br>" . $conn->error;
    echo $fechahoy;
    echo $fechaprogramacion;
    echo $numerodelote;
    echo $tamañototallote;
    echo $tamañolotepresentacion;
    echo $unidadesxlote;
    echo $norefenrencia;

}

	}




 ?>
 
