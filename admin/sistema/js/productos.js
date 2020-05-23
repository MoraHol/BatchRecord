//Cargue de tablas de Productos

$(document).ready(function() {
    $("#listarProductos").DataTable({
    "ajax":{
      "method":"POST",
        "url":"php/listarProductos.php",
    },

    "columns":[
      /* {"defaultContent": "<a href='crearUsuarios.php' <i class='large material-icons' data-toggle='tooltip' title='Adicionar' style='color:rgb(0, 154, 68)'>add</i></a>"}, */
        {"defaultContent": "<a href='actualizarUsuarios.php' <i class='large material-icons' data-toggle='tooltip' title='Editar' style='color:rgb(255, 165, 0)'>edit</i></a>"},
        {"defaultContent": "<a href='#' <i class='large material-icons' data-toggle='tooltip' title='Eliminar' style='color:rgb(255, 0, 0)'>clear</i></a>"},
        {"data": "nombre"},
        {"data": "apellido"},
        {"data": "email"},
        {"data": "cargo"},
        {"data": "modulo"}
          
      ]
    });
  });