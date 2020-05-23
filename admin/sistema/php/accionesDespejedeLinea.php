<?php 

    require_once('../../../conexion.php');

/* Actualizar registro de pregunta */

if (isset($_POST['update'])) {

    $idbatch = $_POST['idbatch'];
    $noreferencia = $_POST['norefenrencia'];
    $fechahoy = $_POST['fechahoy'];
    $fechaprogramacion = $_POST['fechaprogramacion'];
    $numerodelote = $_POST['numerodelote'];
    $tamanototallote = $_POST['tamanototallote'];
    $tamanolotepresentacion = $_POST['tamanolotepresentacion'];
    $unidadesxlote = $_POST['unidadesxlote'];
    
    $modify = mysqli_query($conn, "UPDATE batch SET fecha_creacion='$fechahoy', fecha_programacion='$fechaprogramacion', numero_orden='OP" . $idbatch . "2020', numero_lote='X0" . $idbatch . "20', tamano_lote='$tamanototallote', lote_presentacion='$tamanolotepresentacion', unidad_lote='$unidadesxlote', estado='$numerodelote',  id_producto='$norefenrencia' WHERE id_batch=$idbatch");
    $_SESSION['message'] = "Address updated!";
    
    header('location: crear-batch.php');
  }    


/* Eliminar registros de pregunta */    

    if(isset($_GET['link-borrar'])){
        $id_pregunta = $_GET['link-borrar'];

        $query_pregunta = "DELETE FROM preguntas WHERE id = $id_pregunta";
        $result = mysqli_query($conn, $query_pregunta);

        if($result){
            echo 'Eliminado';
        }else{
            echo 'No Eliminado';
        }
        //mysqli_free_result($query_pregunta);
        mysqli_close($conn);
    }

/* Obtener registros para actualizacion */    

    if(isset($_GET['link-editar'])){

        $id_pregunta = $_GET['link-editar'];

        $query = mysqli_query($conn,"SELECT * FROM preguntas WHERE id = $id_pregunta");
        $data = mysqli_fetch_assoc($query);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        mysqli_close($conn);
    }   
    
?>