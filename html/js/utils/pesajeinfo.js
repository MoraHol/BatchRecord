$.ajax({
    url: `../../api/cargos`,
    type: 'GET'
}).done((data, status, xhr) => {
    data.forEach((cargo, indx) => {
        $(`#cargo-${indx + 1}`).val(cargo.cargo);
    });

});

$('#tablePesaje').dataTable({
    ajax: {
        url: `../../api/materiasp/${referencia}`,
        dataSrc: ''
    },
    paging: false,
    info: false,
    searching: false,
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
            title: 'Peso GRS',
            data: 'porcentaje',
            render: (data, type, row) => {
                return `${data * 100} %`;
            }
        }
    ]
})

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