<?php 
  include('../../conexion.php');
  
  $query_usuarios = mysqli_query($conn, "SELECT p.id, p.pregunta, (m.id) as id_proceso, m.modulo 
  FROM preguntas p INNER JOIN modulo m INNER JOIN modulo_pregunta mp 
  ON p.id = mp.id_pregunta AND m.id = mp.id_modulo");
  
  $result = mysqli_num_rows($query_usuarios);
  
  if($result > 0){
    while($data = mysqli_fetch_assoc($query_usuarios)){
        $arreglo["data"][] =$data;
    }
    echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
  }
  mysqli_free_result($query_usuarios);
  mysqli_close($conn);
  
?> 