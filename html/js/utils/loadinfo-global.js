let idBatch = location.href.split('/')[4];
let referencia = location.href.split('/')[5];
let batch;

Date.prototype.toDateInputValue = (function () {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
});

$('#in_fecha').val(new Date().toDateInputValue());
$('#in_fecha').attr('min', new Date().toDateInputValue());
$.ajax({
    url: `../../api/batch/${idBatch}`,
    type: 'GET'
}).done((data, status, xhr) => {
    batch = data;
    $('#in_numero_orden').val(data.numero_orden);
    $('#in_numero_lote').val(data.numero_lote);
    $('#in_referencia').val(data.referencia);
    $('#in_nombre_referencia').val(data.nombre_referencia);
    $('#in_linea').val(data.nombre_linea);
    $('#in_fecha_programacion').val(data.fecha_programacion);
});


$.ajax({
    url: `../../api/desinfectantes`,
    type: 'GET'
}).done((data, status, xhr) => {
    data.forEach(desinfectante => {
        $('#sel_producto_desinfeccion').append(`<option value="${desinfectante.id}">${desinfectante.nombre}</option>`);
    });

});