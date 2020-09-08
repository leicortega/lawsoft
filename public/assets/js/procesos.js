$(document).ready(function () {
    if (window.location.pathname == '/procesos/crear') {
        cargarDepartamentos() 
    }

    $('#identificacion').blur(function () {
        buscar_cliente()
    })

    $('#form_crear_proceso').submit(function () {
        $('#btn_crear_proceso').attr('disabled', true).html(`<span class="spinner-border spinner-border-sm"> </span> Crear`);
    })
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function cargar_subarea(area) {
    switch (area) {
        case 'Civil':
            $('#sub_tipo').html(`
                <option value="">Seleccione la sub area</option>
                <option value="">Sub area civil</option>
                <option value="">Sub area civil</option>
                <option value="">Sub area civil</option>
                <option value="">Sub area civil</option>
                <option value="">Sub area civil</option>
            `)
            break;
        
        case 'Familia':
            $('#sub_tipo').html(`
                <option value="">Seleccione la sub area</option>
                <option value="">Sub area Familia</option>
                <option value="">Sub area Familia</option>
                <option value="">Sub area Familia</option>
                <option value="">Sub area Familia</option>
                <option value="">Sub area Familia</option>
            `)
            break;

        case 'Laboral':
            $('#sub_tipo').html(`
                <option value="">Seleccione la sub area</option>
                <option value="">Sub Laboral civil</option>
                <option value="">Sub Laboral civil</option>
                <option value="">Sub Laboral civil</option>
                <option value="">Sub Laboral civil</option>
                <option value="">Sub Laboral civil</option>
            `)
            break;
        
        case 'Seguridad Social':
            $('#sub_tipo').html(`
                <option value="">Seleccione la sub area</option>
                <option value="">Sub area Social</option>
                <option value="">Sub area Social</option>
                <option value="">Sub area Social</option>
                <option value="">Sub area Social</option>
                <option value="">Sub area Social</option>
            `)
            break;

        case 'Administrativo':
            $('#sub_tipo').html(`
                <option value="">Seleccione la sub area</option>
                <option value="">Sub area Administrativo</option>
                <option value="">Sub area Administrativo</option>
                <option value="">Sub area Administrativo</option>
                <option value="">Sub area Administrativo</option>
                <option value="">Sub area Administrativo</option>
            `)
            break;
        
        case 'Penal':
            $('#sub_tipo').html(`
                <option value="">Seleccione la sub area</option>
                <option value="">Sub area Penal</option>
                <option value="">Sub area Penal</option>
                <option value="">Sub area Penal</option>
                <option value="">Sub area Penal</option>
                <option value="">Sub area Penal</option>
            `)
            break;
    }
}

function cargarDepartamentos() {
    var html = '<option value="">Seleccione el departamento</option>';
	$.ajax({
		url: 'https://www.datos.gov.co/resource/xdk5-pm3f.json?$select=departamento&$group=departamento',
		type: 'GET',
		success: function (data) {
			data.forEach(dpt => {
				html += '<option value="'+dpt.departamento+'">'+dpt.departamento+'</option>';
			});
			$('#departamento').html(html)
		}
    })
}

function cargarMunicipios(dpt) {
    var html = '<option value="">Seleccione la ciudad</option>';
    $.ajax({
        url: 'https://www.datos.gov.co/resource/xdk5-pm3f.json?departamento='+dpt,
        type: 'GET',
        success: function (data) {
            data.forEach(dpt => {
                html += '<option value="'+dpt.municipio+'">'+dpt.municipio+'</option>';
            });
            $('#municipio').html(html)
        }
    })
}

function buscar_cliente() {
    var id = $('#identificacion').val()

    $.ajax({
        url: '/procesos/searh/'+id,
        type: 'get',
        success: function (data) {
            if (data[0]) {
                $('#identificacion').val(data[0].identificacion)
                $('#nombre').val(data[0].nombre)
                $('#direccion').val(data[0].direccion)
                $('#telefono').val(data[0].telefono)
                $('#correo').val(data[0].correo)
            } else {
                $('#nombre').val('')
                $('#direccion').val('')
                $('#telefono').val('')
                $('#correo').val('')
            }
        }
    });

    return false;
}

function agregar_actuacion(id) {
    $('#procesos_id').val(id)

    $('#ModalAddActuacion').modal('show')
}

