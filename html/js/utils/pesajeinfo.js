let flagWeight = false;

$.ajax({
    url: `../../api/questions/1`,
    type: 'GET'
}).done((data, status, xhr) => {
    $('#preguntas-div').html('');
    data.forEach((question, indx) => {
        $('#preguntas-div').append(`<div class="col-md-10 col-2 align-self-right">
                    <a for="recipient-name" class="col-form-label">${question.pregunta}</a>
                  </div>
                  <div class="col-md-1 col-0 align-self-center">
                    <label class="checkbox"> <input type="radio" class="questions" name="question-${question.id}" value="si"/>
                    </label>
                  </div>
                  <div class="col-md-1 col-0 align-self-center">
                    <label class="checkbox"> <input type="radio" name="question-${question.id}" value="no"/>
                    </label>
                  </div>`);
    });

});

$.ajax({
    url: `../../api/cargos`,
    type: 'GET'
}).done((data, status, xhr) => {
    data.forEach((cargo, indx) => {
        $(`#cargo-${indx + 1}`).val(cargo.cargo);
    });

});

let tablePesaje = $('#tablePesaje').dataTable({
    ajax: {
        url: `../../api/materiasp/${referencia}`,
        dataSrc: ''
    },
    paging: false,
    info: false,
    searching: false,
    sorting: false,
    columns: [
        {
            title: 'Referencia',
            data: 'referencia'
        },
        {
            title: 'Materia Prima',
            data: 'alias'
        },
        {
            title: 'Peso (<a href="javascript:cambioConversion();" class="conversion_weight">g</a>)',
            className: 'conversion_weight_column',
            data: 'porcentaje',
            render: (data, type, row) => {
                if (flagWeight) {
                    return (data * batch.tamano_lote) / 1000;
                } else {
                    return data * batch.tamano_lote;
                }

            }
        }
    ]
});

// $('.conversion_weight').click(function (event) {
// event.preventDefault();
// flagWeight = !flagWeight;
// tablePesaje.api().ajax.reload();
// $(tablePesaje.api().column(2).header()).html(`Peso (<a href="javascript:void(0);" class="conversion_weight">${flagWeight ? 'kg' : 'g'}</a>)`);
// });

$('.in_desinfeccion').click((event) => {
    event.preventDefault();
    let flag = false;
    $('.questions').each((indx, question) => {
        if (flag) {
            return;
        }
        let name = $(question).attr('name');
        if (!$(`input[name='${name}']:radio`).is(':checked')) {
            flag = true;
            $.alert({
                title: 'Atencion!',
                content: 'Completa las preguntas primero',
            });
        }
    });

});


Date.prototype.toDateInputValue = (function () {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
});

$('#in_fecha_pesaje').val(new Date().toDateInputValue());
$('#in_fecha_pesaje').attr('min', new Date().toDateInputValue());

function cambioConversion() {
    flagWeight = !flagWeight;
    tablePesaje.api().ajax.reload();
    $(tablePesaje.api().column(2).header()).html(`Peso (<a href="javascript:cambioConversion();" class="conversion_weight">${flagWeight ? 'kg' : 'g'}</a>)`);
}