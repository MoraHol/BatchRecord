<?php
  include('../../conexion.php');
  
  //$op = $_POST['operacion'];

  /* switch($op){
    case 1: */ //listar Batch
      $query_batch = mysqli_query($conn, 'SELECT batch.numero_orden, producto.referencia, producto.nombre_referencia, presentacion_comercial.presentacion,batch.numero_lote, batch.tamano_lote, propietario.nombre,batch.fecha_creacion, batch.fecha_programacion, batch.estado
                                          FROM batch INNER JOIN producto INNER JOIN presentacion_comercial INNER JOIN propietario
                                          ON batch.id_producto = producto.referencia AND producto.id_presentacion_comercial = presentacion_comercial.id AND producto.id_propietario = propietario.id');
    
      $result = mysqli_num_rows($query_batch);
      
      if($result > 0){
        while($data = mysqli_fetch_assoc($query_batch)){
          $arreglo["data"][] =$data;
        }
        echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);

      }else{
        echo false;
      }
      mysqli_free_result($query_batch);
      mysqli_close($conn);
    /* break;

  } */
?>

  