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