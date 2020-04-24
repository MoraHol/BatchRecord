$('#aprobacionTable').dataTable({
    ajax: {
        url: '/api/batch',
        dataSrc: ''
    },
    language: {
        url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'
    },
    columns: [
        {
            title: '# de Orden',
            data: 'numero_orden'
        },
        {
            title: 'Referencia',
            data: 'referencia'
        },
        {
            title: 'Nombre Referencia',
            data: 'nombre_referencia'
        },
        {
            title: 'Tamaño Lote',
            data: 'tamano_lote'
        },
        {
            title: 'Fecha de Programacion',
            data: 'fecha_programacion'
        },
        {
            title: 'Estado',
            data: 'estado',
            render: (data, type, row) => {
                'use strict';
                return data === 1 ? 'Activo' : 'Inactivo';
            }
        },
        {
            title: '',
            data: '',
            render: (data, type, row) => {
                'use strict';
                return `<a class="btn waves-effect waves-light btn-danger pull-center" href="aprobacioninfo/${row.id_batch}/${row.referencia}">Ingresar</a>`;
            }
        },
    ]
});