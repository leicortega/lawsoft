@extends('layouts.app')

@section('title_content') Calendario @endsection

@section('myScripts')
    @php echo '<script>var audiencias = '.json_encode($audiencias).'</script>'; @endphp
    <script>
        function getEnvents() {
            let eventos = [];
            for(var i=0; i < audiencias.length; i++) {
                eventos.push({
                    title: 'Audiencia ' + audiencias[i].procesos.num_proceso + ' de ' + audiencias[i].procesos.clientes.nombre,

                    start: audiencias[i].fecha,

                    className: 'bg-info',

                    url_redirect: '/procesos/ver/' + audiencias[i].procesos.id
                });
            }

            return eventos;
        }
    </script>
    <script src="{{ asset('assets/bundles/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/page/calendar.js') }}"></script>
@endsection

@section('content')

<div class="section-body py-4">
    <div class="container-fluid">
        <div class="row clearfix row-deck">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Event Edit Modal popup -->
<div class="modal fade" id="eventEditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Evento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nobre del evento</label>
                            <input class="form-control" name="event-name" type="text" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Fecha</label>
                            <input class="form-control" name="event-date" type="text" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" id="url_redirect" class="btn save-btn btn-success">Ir</a>
                <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

@endsection

