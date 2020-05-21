
//Configuracion parametros Datatables

/* $(document).ready(function() {
    $('#listaUsuarios').DataTable({
        scrollY:        '50vh',
        scrollCollapse: true,
        paging:         false,

        "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "Sin resultados",
        "sEmptyTable":     "Ningún dato disponible",
        "sInfo":           "Mostrando registros del _START_ al _END_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
        }
    }, */

    

/*     });
}); 
 */

//Cargue de datos Tabla Usuarios

$(document).ready(function() {
    $("#listaUsuarios").DataTable({
        scrollY:        '50vh',
        scrollCollapse: true,
        paging:         false,

    "ajax":{
      "method":"POST",
        "url":"listarUsuarios.php",
    },

    "columns":[
        {"data": "nombre"},
        {"data": "apellido"},
        {"data": "email"},
        {"data": "cargo"},
        {"data": "modulo"},
        /* {"defaultContent": "<a href='crearUsuarios.php' <i class='large material-icons' data-toggle='tooltip' title='Adicionar' style='color:rgb(0, 154, 68)'>how_to_reg</i></a>"}, */
        {"defaultContent": "<a href='actualizarUsuarios.php?id='data':'id'<i class='large material-icons' data-toggle='tooltip' title='Editar' style='color:rgb(255, 165, 0)'>edit</i></a>"},
        {"defaultContent": "<a href='#' <i class='large material-icons' data-toggle='tooltip' title='Eliminar' style='color:rgb(255, 0, 0)'>clear</i></a>"}  
      ]
    });
  });


//Almacenar los usuarios

$(document).ready(function(){
    $('#btnguardarUsuarios').click(function(){
        var datos = $('#frmagregarUsuarios').serialize();
        $.ajax({
            type: "POST",
            url: "guardarUsuarios.php",
            data: datos,
            success: function(r){
                if(r==1){
                    //alertify.alert('Alert Message!', function(){ alertify.success('Ok'); });
                    alertify.set("notifier","position", "top-right"); alertify.success("Agregado con éxito.");
                    //alert("Agregado con éxito");
                    document.getElementById("frmagregarUsuarios").reset();
                }else{
                    alertify.set("notifier","position", "top-right"); alertify.error("Usuario Registrado.");
                    //alert("Usuario Registrado");
                }
            }
        });
        return false;
    });
});


//Cargue de tablas de Productos

$(document).ready(function() {
    $("#listarProductos").DataTable({
    "ajax":{
      "method":"POST",
        "url":"listarProductos.php",
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

  //Cargue de tablas de Parametros de Control

$(document).ready(function() {
    $("#listarDespeje").DataTable({
        scrollY:        '50vh',
        scrollCollapse: true,
        paging:         false,

        "ajax":{
        "method":"POST",
            "url":"listarParametros.php",
        },

        "columns":[
        /* {"defaultContent": "<a href='crearUsuarios.php' <i class='large material-icons' data-toggle='tooltip' title='Adicionar' style='color:rgb(0, 154, 68)'>add</i></a>"}, */
            {"data": "pregunta"},
            {"data": "modulo"},
            /*{"data": "email"}, */
            {"defaultContent": "<a href='actualizarUsuarios.php' <i class='large material-icons' data-toggle='tooltip' title='Editar' style='color:rgb(255, 165, 0)'>edit</i></a>"},
            {"defaultContent": "<a href='#' class='borrarRegistro' registro='<?php echo $data['id'] ?> <i class='large material-icons' data-toggle='tooltip' title='Eliminar' style='color:rgb(255, 0, 0)'>clear</i></a>"}
            
        ]
    });
  });

  function preguntarSiNo(){
      alertify.confirm('Confirm Title', 'Confirm Message', function(){ alertify.success('Ok') }
                , function(){ alertify.error('Cancel')});
  }