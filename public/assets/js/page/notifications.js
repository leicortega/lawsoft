$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
   $.ajax({
      url: '/notificaciones',
      type: 'POST',
      success: function (data) {
        $('#num_notifiacaiones').text(data);
      }
   });
});

function cargar_notificaciones() {
    $(document).ready(function () {
        $.ajax({
            url: '/notificaciones/load',
            type: 'POST',
            success: function (data) {
                console.log(data)
                let html = '';

                data.forEach(audiencia => {
                    html += `
                        <li>
                            <a href="/procesos/ver/${ audiencia.procesos.id }" class="d-flex">
                                <div class="feeds-left"><i class="fa fa-bank"></i></div>
                                <div class="feeds-body">
                                    <h4 class="title text-danger">${ audiencia.procesos.num_proceso }</h4>
                                    <small>${ audiencia.procesos.clientes.nombre }</small>
                                    <small class="text-muted">${ audiencia.fecha }</small>
                                </div>
                            </a>
                        </li>
                    `;
                });

                $('#notifications_content').html(html);
            }
        });
     });
}
