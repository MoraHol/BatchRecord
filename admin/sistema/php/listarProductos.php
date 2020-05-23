<?php 
  require_once('../../../conexion.php');
  
  $query_usuarios = mysqli_query($conn, "SELECT * FROM Productos");
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