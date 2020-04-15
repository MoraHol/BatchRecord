

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
            data: 'porcentaje'
        }
    ]
})