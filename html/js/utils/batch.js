
/* Inicializar tabla Batch  */

var editar;
var datos;
var tabla;
var data;

$(document).ready(function() {   
    tabla = $("#tablaBatch").DataTable({
        
        responsive: true,
        scrollCollapse: true,
        language: {url: '/admin/sistema/admin_componentes/es-ar.json'},

        ajax:{
            method : "POST",
            url : "php/listarBatch.php",
            data : {"operacion" : "1"},
        },

        columns:[
            {"defaultContent": "<input type='radio' id='express' name='optradio'>"},
            {"data": "id_batch"},
            {"data": "numero_orden"},
            {"data": "referencia"},
            {"data": "nombre_referencia"},
            /* {"data": "presentacion"}, */
            {"data": "numero_lote"},
            {"data": "tamano_lote"},
            {"data": "nombre"},
            {"data": "fecha_creacion"},
            {"data": "fecha_programacion"},
            {"data": "estado"},
            
            {"defaultContent": "<a href='#' <i class='large material-icons link-editar' data-toggle='tooltip' title='Editar' style='color:rgb(255, 193, 7)'>&#xE254;</i></a>"},
            {"defaultContent": "<a href='#' <i class='large material-icons link-borrar' data-toggle='tooltip' title='Eliminar' style='color:rgb(234, 67, 54)'>delete_forever</i></a>"}
        ]
    });
});

/*  */
/* 
$(document).ready(function() {
    var table = $('#tablaBatch').dataTable();

    // Sort in the order that was origially in the HTML
    var nTd = table.fnGetTd( $('#tablaBatch tbody tr:eq(1)')[0], 1 );
    console.log( nTd );
} ); */

/* Cargar datos para Actualizar registros */

$(document).on('click', '.link-editar', function(e){
    e.preventDefault();
    editar = true;

    
    //let id = $(this).parent().parent().children().first().text();
    var texto = $(this).parent().parent().children()[1];
    var id = $(texto).text();
    
    $.ajax({
        method: 'POST',
        url : 'php/listarBatch.php',
        data: {operacion : "6", id : id},  
        
        
         success: function(response){
            var info = JSON.parse(response);            
            $('#idbatch').val(info.id_batch);
            $('#referencia').val(info.referencia);
            $('#nombrereferencia').val(info.nombre_referencia);
            $('#marca').val(info.marca);
            $('#propietario').val(info.propietario);
            $('#producto').val(info.nombre_referencia);
            $('#presentacioncomercial').val(info.presentacion);
            $('#linea').val(info.linea);
            $('#notificacionSanitaria').val(info.notificacion_sanitaria);
            $('#densidad').val(info.densidad);
            $('#unidadesxlote').val(info.unidad_lote);
            $('#tamanototallote').val(info.tamano_lote);
            $('#fechaprogramacion').val(info.fecha_programacion);

            $("#cmbNoReferencia"). css("display", "none");
            $("#referencia"). css("display", "block");
            $('#guardarBatch').html('Actualizar');
            $('.tcrearBatch').html('Actualizar Batch Record');
            $('#modalCrearBatch').modal('show');
            actualizarTabla();
        },
        error: function(response){
            console.log(response);
        } 
    });
});

/* Mostrar Modal y Ocultar select referencias */

function mostrarModal(){
    $("#referencia").css("display", "none");
    $("#cmbNoReferencia").css("display", "block");
    //$("#cmbNoReferencia").valor()
    $("#modalCrearBatch").find("input,textarea,select").val("");

    $('#modalCrearBatch').modal('show'); 
}

/* Borrar registro */

$(document).on('click', '.link-borrar', function(e){
    e.preventDefault();
    
    //let id = $(this).parent().parent().children().first().text();
    var texto = $(this).parent().parent().children()[1];
    var id = $(texto).text();
    
    var confirm = alertify.confirm('Samara Cosmetics','¿Está seguro de eliminar este registro?',null,null).set('labels', {ok:'Si', cancel:'No'});
 
    confirm.set('onok', function(r){ 
        if(r){
            $.ajax({
                'method' : 'POST',
                'url' : 'php/listarBatch.php',
                'data':{operacion : "2", id : id},
                
            });
            //location.DataTable().reload();
            actualizarTabla()
            alertify.success('Batch Record Eliminado');
        }
    });       
});


/* Actualizar tabla */

function actualizarTabla() {
    $('#tablaBatch').DataTable().clear();
    $('#tablaBatch').DataTable().ajax.reload();
}

//Clonar un Batch Record

function clonar() {
    if ($("input[name='optradio']:radio").is(':checked')) {
        $('#ClonarModal').modal('show');
    } else {
        alertify.set("notifier","position", "top-right"); alertify.error("Para Clonar seleccione un Batch Record");
    }
}

$('input:radio[name=optradio]').click(function () {
    $('#tablaBatch tbody tr').removeClass('selected')
    $(this).parent().parent().addClass('selected')
});

$('#form_clonar').submit(function (event) {
    event.preventDefault();
    let form = $(this);
    let obj = form.serializeToJSON();
    obj.idbatch = $('input:radio[name=optradio]:checked').val();
    console.log(obj)
    $.ajax({
        url: '/api/clonebatch',
        type: 'post',
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(obj)
    }).done((data, status, xhr) => {
        if (data.success) {
            location.reload();
        } else {
            $.alert('Error al clonar');
        }
    });
});


/* Multipresentacion */

$('#tablaBatch tbody').on( 'click', 'tr', function () {  
    data = tabla.row( this ).data();
});

function multipresentacion() {
    if ($("input[name='optradio']:radio").is(':checked')) {
        //console.log(data);
        $.ajax({
            type: "POST",
            'url' : 'php/listarBatch.php',
            'data':{"operacion" : "8" , id : data.id_batch},
            success: function(r){
                var info = JSON.parse(r);            
                //$('#idbatch').val(info[0]);
                console.log(info);
                
                $('#Modal_Multipresentacion').modal('show');
                
                }
            });
                

    } else {
        alertify.set("notifier","position", "top-right"); alertify.error("Para Multipresentación seleccione un Batch Record");
    }
}

$('#form-multi').submit(function (event) {
    event.preventDefault();

    var texto = $(this).parent().parent().children()[1];
    var id = $(texto).text();

    console.log(id);
    return false;

    let form = $(this);
    let obj = form.serializeToJSON();
    obj.idbatch = $('input:radio[name=optradio]:checked').val();
    console.log(obj)
    return false;
    $.ajax({
        url: '/api/clonebatch',
        type: 'post',
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(obj)
    }).done((data, status, xhr) => {
        if (data.success) {
            location.reload();
        } else {
            $.alert('Error al clonar');
        }
    });
});

/* Activar filtrado de fechas */

function filtrarfechas(){
    $("#filtrafechas").css("display", "block");
}

function ocultarfiltrarfechas(){
    $("#filtrafechas").css("display", "none");
}

/* Filtrado de fechas */

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[8] ) || 0; 
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    var table = $('#tablaBatch').DataTable();

    $('#min, #max').keyup( function() {
        table.draw();
    } );
} );


/* Llenar el selector de referencias al crear Batch */

/* $(document).on('click', '#cmbNoReferencia', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        'url' : 'php/listarBatch.php',
        'data':{"operacion" : "3"},
        success: function(r){
            $('#cmbNoReferencia').html(r);
            }
        });
    });
 */
/* Llenar campos de producto de acuerdo con la referencia del producto */

$(document).ready(function() {
    $('#cmbNoReferencia').change(function(){
        recargarDatos();
    });
});

function recargarDatos(){
    var combo = document.getElementById("cmbNoReferencia");
    var sel = combo.options[combo.selectedIndex].text;

    $.ajax({
        type: "POST",
        'url' : 'php/listarBatch.php',
        'data':{"operacion" : "4", "id" : sel},
        success: function(r)
        {
            var info = JSON.parse(r);            
            $('#idbatch').val(info[0]);
            //$('#referencia').val(info[0]);
            $('#nombrereferencia').val(info[1]);
            $('#marca').val(info[2]);
            $('#notificacionSanitaria').val(info[3]);
            $('#propietario').val(info[4]);
            $('#producto').val(info[5]);          
            $('#presentacioncomercial').val(info[6]);
            $('#linea').val(info[7]);
            $('#densidad').val(info[8]);
        }
    });
}

/* calcular Tamaño del Lote */

function CalculoTamanolote (valor) {
    var total = 0;	
    valor = parseInt(valor);
	
    densidad = document.getElementById('densidad').value;
    //console.log(densidad);
    presentacion = document.getElementById('presentacioncomercial').value;
    //console.log(presentacion);
    total = ((valor) * (densidad) * (presentacion))/1000;
    console.log(total);    
    document.getElementById('tamanototallote').value = total //formatter.format(total);
}

/* Formateo de numeros */

const formatter = new Intl.NumberFormat('de-DE', {
    //style: 'currency',
    //currencySign: 'accounting'
    /* minimumFractionDigits: 2 */
  })

  /* Guardar datos Crear y Actualizar batch*/

$(document).ready(function(){
    $('#formBatch').submit(function(e){
        e.preventDefault();
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '/' + (month<10 ? '0' : '') + month + '/' + (day<10 ? '0' : '') + day;

        if(!editar){
            datos = {
                operacion: "5",
                ref: $('#idbatch').val(),
                nref: $('#nombrereferencia').val(),
                unidades: $('#unidadesxlote').val(),
                lote: $('#tamanototallote').val(),
                presentacion: $('#presentacioncomercial').val(),
                programacion: $('#fechaprogramacion').val(),
                /* fecha: $('#fechahoy').val(), */
                fecha : output,
                
                };
        }else{
             datos = {
                operacion: "7",
                ref: $('#idbatch').val(),
                unidades: $('#unidadesxlote').val(),
                lote: $('#tamanototallote').val(),
                programacion: $('#fechaprogramacion').val(),
                fecha: $('#fechahoy').val(),
                
                };
        }
        
        $.ajax({
            type: "POST",
            url: "php/listarBatch.php",
            data: datos,
            
            success: function(r){
                alertify.set("notifier","position", "top-right"); alertify.success("Batch Record registrado con éxito.");
                //document.getElementById("formBatch").reset();
                cerrarModal();
                actualizarTabla();
                
            },
            error: function(r){
                alertify.set("notifier","position", "top-right"); alertify.error("Error al registrar el Batch Record.");
            } 
        }); 
     });
});


/* cerrar modal al crear Batch */

function cerrarModal(){
    $('#modalCrearBatch').modal('hide');
}

/* Adicionar y elimina campos para los tanques al crear batch record */
var maxField = 5;
var ps = 1;
var pr = 1;

$("#adicionarPesaje").on('click', function(){
    if(ps < maxField){
        $("#addTanquePesaje tbody tr:eq(0)").clone().removeClass().appendTo('#addTanquePesaje');
        ps++;
    }    
});

$(document).on("click",".eliminarPesaje", function(){
    var parent = $(this).parents().get(0);
    if(ps != 1){
        $(parent).remove();
        ps--;
    }
});

$("#adicionarPreparacion").on('click', function(){
    if(pr < maxField){
        $("#addTanquePreparacion tbody tr:eq(0)").clone().removeClass().appendTo('#addTanquePreparacion');
        pr++;
    }    
});

$(document).on("click",".eliminarPreparacion", function(){
    var parent = $(this).parents().get(0);
    if(pr != 1){
        $(parent).remove();
        pr--;
    }
});