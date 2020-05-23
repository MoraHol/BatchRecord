
//Cargue de Parametros de Control en DataTable

$(document).ready(function() {
    $("#listarDespeje").DataTable({
        scrollY:        '50vh',
        scrollCollapse: true,
        paging:         false,
        language: {url: 'admin_componentes/es-ar.json'},

        "ajax":{
        "method":"POST",
            "url":"php/listarParametros.php",
        },

        "columns":[
            {"data": "id"},
            {"data": "pregunta"},
            {"data": "resp"},
            {"defaultContent": "<a href='#' <i class='large material-icons link-editar'  style='color:rgb(255, 165, 0)'>edit</i></a>"},
            {"defaultContent": "<a href='#' <i class='large material-icons link-borrar' data-toggle='tooltip' title='Eliminar' style='color:rgb(255, 0, 0)'>clear</i></a>"}
            
        ]
    });
});


/* Cargar datos para Actualizar registros */

$(document).on('click', '.link-editar', function(e){
    e.preventDefault();
    let id = $(this).parent().parent().children().first().text();

    $.ajax({
        url : `php/accionesDespejedeLinea.php?link-editar=${id}`,
        data : 'id',   
    
        success: function(response){
            var info = JSON.parse(response);            
            $('#pregunta').val(info.pregunta);
            $('#resp').val(info.resp);
            $('#btnguardarPregunta').html('Actualizar');
            $('.tpregunta').html('Actualizar Registros');
            $('#modalDespejedeLinea').modal('show');
            refreshTable();
        },
        error: function(response){
            console.log(response);
        }
    });
});



/*      var confirm= alertify.confirm('Samara Cosmetics','¿Está seguro de actualizar este registro?',null,null).set('labels', {ok:'Si', cancel:'No'}); 	
 
     confirm.set('onok', function(r){ 
         if(r){
             $.ajax({
                 'method' : 'GET',
                 'url' : `php/accionesDespejedeLinea.php?link-editar=${id}`,
                 'data' : 'id',
             });
             refreshTable();
             alertify.success('Registro Eliminado');
         }
     });   */     
 


/* Borrar registros */

$(document).on('click', '.link-borrar', function(e){
    e.preventDefault();
    
    let id = $(this).parent().parent().children().first().text();
 
    var confirm= alertify.confirm('Samara Cosmetics','¿Está seguro de eliminar este registro?',null,null).set('labels', {ok:'Si', cancel:'No'}); 	
 
    confirm.set('onok', function(r){ 
        if(r){
            $.ajax({
                'method' : 'GET',
                'url' : `php/accionesDespejedeLinea.php?link-borrar=${id}`,
                'data' : 'id',
            });
            refreshTable();
            alertify.success('Registro Eliminado');
        }
    });       
});

/* Actualizar tabla */

function refreshTable() {
    $('#listarDespeje').DataTable().clear();
    $('#listarDespeje').DataTable().ajax.reload();
}


/* Almacenar Registros */

$(document).ready(function(){
    $('#btnguardarPregunta').click(function(e){
        e.preventDefault();
        var datos = $('#frmpreguntas').serialize();
        $.ajax({
            type: "GET",
            url: "guardarUsuarios.php",
            data: datos,
            success: function(r){
                if(r==1){
                    alertify.set("notifier","position", "top-right"); alertify.success("Agregado con éxito.");
                    document.getElementById("frmagregarUsuarios").reset();
                }else{
                    alertify.set("notifier","position", "top-right"); alertify.error("Usuario No Registrado.");
                }
            }
        });
        //return false;
    });
});