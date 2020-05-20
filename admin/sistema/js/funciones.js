
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
                    alert("Agregado con éxito");
                    document.getElementById("frmagregarUsuarios").reset();
                }else{
                    alert("Usuario Registrado");
                }
            }
        });
        return false;
    });
});