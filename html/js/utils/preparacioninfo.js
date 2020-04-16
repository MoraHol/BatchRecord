let idBatch = location.href.split('/')[4];
let referencia = location.href.split('/')[5];

Date.prototype.toDateInputValue = (function () {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
});

$('#in_fecha').attr('min', new Date().toDateInputValue());
$.ajax({
    url: `../../api/batch/${idBatch}`,
    type: 'GET'
}).done((data, status, xhr) => {
    $('#in_numero_orden').val(data.numero_orden);
    $('#in_numero_lote').val(data.numero_lote);
    $('#in_fecha').val(data.fecha_programacion);
    $('#in_referencia').val(data.referencia);
    $('#in_nombre_referencia').val(data.nombre_referencia);
    $('#in_linea').val(data.nombre_linea);
});

$.ajax({
    url: `../../api/questions`,
    type: 'GET'
}).done((data, status, xhr) => {
    $('#preguntas-div').html('');
    data.forEach(question => {
        $('#preguntas-div').append(`<div class="col-md-10 col-2 align-self-right">
                    <a for="recipient-name" class="col-form-label">${question.pregunta}</a>
                  </div>
                  <div class="col-md-1 col-0 align-self-center">
                    <label class="checkbox"> <input type="radio" name="question-${question.id}" value="si"/>
                    </label>
                  </div>
                  <div class="col-md-1 col-0 align-self-center">
                    <label class="checkbox"> <input type="radio" name="question-${question.id}" value="no"/>
                    </label>
                  </div>`);
    });

});
$.ajax({
    url: `../../api/desinfectantes`,
    type: 'GET'
}).done((data, status, xhr) => {
    data.forEach(desinfectante => {
        $('#sel_producto_desinfeccion').append(`<option value="${desinfectante.id}">${desinfectante.nombre}</option>`);
    })

});


$.ajax({
    url: `/api/agitadores`,
    type: 'GET'
}).done((data, status, xhr) => {
    data.forEach(agitador => {
        $('#sel_agitador').append(`<option value="${agitador.nombre}">${agitador.nombre}</option>`);
    });
});

$.ajax({
    url: `/api/marmitas`,
    type: 'GET'
}).done((data, status, xhr) => {
    data.forEach(agitador => {
        $('#sel_agitador').append(`<option value="${agitador.nombre}">${agitador.nombre}</option>`);
    });
});


$.ajax({
    url: `/api/productsDetails/${referencia}`,
    type: 'GET'
}).done((data, status, xhr) => {
    $('#espec_color').html(data.color);
    $('#espec_olor').html(data.olor);
    $('#espec_apariencia').html(data.apariencia);
    $('#espec_poder_espumoso').html(data.poder_espumoso);
    $('#espec_untosidad').html(data.untosidad);
});

$.ajax({
    url: `/api/instructivos/${referencia}`,
    type: 'GET'
}).done((data, status, xhr) => {
    $('#pasos_instructivo').html('');

    data.forEach((instructivo, indx) => {
        $('#pasos_instructivo').append(`<a href="javascript:void(0)" onclick="procesoTiempo(event)" class="proceso-instructivo" attr-tiempo="${instructivo.tiempo}">PASO ${indx + 1}: ${instructivo.proceso} </a>  <br/>`);
    });
});

function procesoTiempo(event) {
    let tiempo = $(event.target).attr('attr-tiempo');
    $('#tiempo_instructivo').val(tiempo);
}