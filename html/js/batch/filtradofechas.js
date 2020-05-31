
/* Inicia con los elementos ocultos */

$(document).ready(function(){
    $("#filtrafechas").css("display", "block");
}) 

/* muestra elementos filtrado */

function filtrarfechas(){
    $("#filtrafechas").css("display", "block");
}

/* Oculta los elementos para filtrado de fechas */

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