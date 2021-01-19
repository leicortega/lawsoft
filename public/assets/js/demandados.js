function eliminar_demandado(id) {
    if (window.confirm("¿Seguro desea eliminar el demandado?")) {
        $.ajax({
            url: '/demandados/delete',
            type: 'post',
            data: {id:id},
            success: function (data) {
                $('#delete_confirmed').removeClass('d-none')
                setTimeout(function(){ location.reload(); }, 600);
            }
        });
    }
}

function habilitar_formularo_demandado() {
    $('#identificacion').prop("readonly", false);
    $('#nombre').prop("readonly", false);
    $('#direccion').prop("readonly", false);
    $('#telefono').prop("readonly", false);
    $('#correo').prop("readonly", false);

    $('#btn_habilitar_actualizar_demandado').addClass('d-none')
    $('#btn_enviar_actualizar_demandado').removeClass('d-none')
    $('#btn_cancelar_actualizar_demandado').removeClass('d-none')
}

function deshabilitar_formularo_demandado() {
    $('#identificacion').prop("readonly", true);
    $('#nombre').prop("readonly", true);
    $('#direccion').prop("readonly", true);
    $('#telefono').prop("readonly", true);
    $('#correo').prop("readonly", true);

    $('#btn_habilitar_actualizar_demandado').removeClass('d-none')
    $('#btn_enviar_actualizar_demandado').addClass('d-none')
    $('#btn_cancelar_actualizar_demandado').addClass('d-none')
}
