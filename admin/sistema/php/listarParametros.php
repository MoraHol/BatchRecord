<?php 
  require_once('../../../conexion.php');
  
  $query_parametros = mysqli_query($conn, "SELECT * FROM preguntas");

/* SELECT p.id, p.pregunta, (m.id) as id_proceso, m.modulo 
FROM preguntas p INNER JOIN modulo m INNER JOIN modulo_pregunta mp 
ON p.id = mp.id_pregunta AND m.id = mp.id_modulo */
  
  $result = mysqli_num_rows($query_parametros);
  
  if($result > 0){
    while($data = mysqli_fetch_assoc($query_parametros)){
      $arreglo["data"][] =$data;
    }
    echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);

  }else{
    echo false;
  }
  mysqli_free_result($query_parametros);
  mysqli_close($conn);
  
?> 