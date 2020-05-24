<?php 

    require_once('../../../conexion.php');

/* guardar registro */

if (isset($_POST['update'])) {
    
  }    


/* Eliminar registros */    

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

/* Obtener registros */    

    if(isset($_GET['link-editar'])){

        $id_pregunta = $_GET['link-editar'];

        $query = mysqli_query($conn,"SELECT * FROM preguntas WHERE id = $id_pregunta");
        $data = mysqli_fetch_assoc($query);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        mysqli_close($conn);
    }   
    
?>