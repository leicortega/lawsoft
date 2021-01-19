@extends('layouts.app')

@section('title_content') Demandados @endsection

@section('myScripts')
    <script src="{{ asset('assets/js/procesos.js') }}"></script>
    <script src="{{ asset('assets/js/demandados.js') }}"></script>
@endsection

@section('content')

<div class="section-body">

    <div class="col-lg-12">
        <a href="/"><button type="button" class="btn btn-primary mb-2"><i class="fa fa-arrow-circle-left mr-2"></i> Atras </button></a>
        <div class="card bg-none p-3">
            <div class="card-header">
                <h3 class="card-title">Demandados</h3>
                <div class="card-options">
                    <button type="button" data-toggle="collapse" data-target="#agg_demandado" aria-expanded="true" aria-controls="agg_demandado" class="btn btn-primary"> Agregar + </button>
                </div>
            </div>
            <div class="card-body pt-0">

                @if (session()->has('demandado') && session('demandado') == 1)
                    <div class="alert alert-icon alert-success col-12" role="alert">
                        <i class="fe fe-check mr-2" aria-hidden="true"></i> Demandado agregado correctamente
                    </div>
                @endif

                @if (session()->has('demandado') && session('demandado') == 0)
                    <div class="alert alert-icon alert-danger col-12" role="alert">
                        <i class="fe fe-check mr-2" aria-hidden="true"></i> Ya existe el demandado
                    </div>
                @endif

                <div class="alert alert-icon alert-success col-12 d-none" id="delete_confirmed" role="alert">
                    <i class="fe fe-check mr-2" aria-hidden="true"></i> Demandado eliminado correctamente
                </div>

                <div class="card p-5 collapse" id="agg_demandado" style="border: solid 1px #cda854;background: #e9ecef !important;">

                    <form action="/demandados/agregar_demandado" method="post">
                        @csrf

                        <div class="row">
                            <div class="form-group col-3">
                                <label class="form-label">Identificacion Demandado</label>
                                <input name="identificacion_demandado_1" id="identificacion_demandado_1" class="form-control" onblur="buscar_demandado(1)" placeholder="Escriba la identificacion" required>
                            </div>
                            <div class="form-group col-3">
                                <label class="form-label">Nombre Demandado</label>
                                <input type="text" name="nombre_demandado_1" id="nombre_demandado_1" class="form-control" placeholder="Escriba el nombre" required  readonly>
                            </div>
                            <div class="form-group col-3">
                                <label class="form-label">Telefono Demandado</label>
                                <input type="number" class="form-control" name="telefono_demandado_1" id="telefono_demandado_1" placeholder="Escriba el telefono" readonly>
                            </div>
                            <div class="form-group col-3">
                                <label class="form-label">Correo Demandado</label>
                                <input type="email" class="form-control" name="correo_demandado_1" id="correo_demandado_1" placeholder="Escriba el correo" readonly>
                            </div>
                            <input type="hidden" name="existe_demandado_1" id="existe_demandado_1" />
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>

                    </form>

                </div>

                <div class="table-responsive table_e2">
                    <table class="table table-hover table-vcenter table_custom spacing5 text-nowrap mb-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre demandado</th>
                                <th>Telefono demandado</th>
                                <th>Correo demandado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandados as $demandado)
                            <tr>
                                <td>
                                    <span>{{ $demandado->identificacion }}</span>
                                </td>
                                <td>
                                    <span class="c_name ml-0"><span>{{ $demandado->nombre }}</span></span>
                                </td>
                                <td>
                                    <span class="phone"><i class="fa fa-phone mr-2"></i>{{ $demandado->telefono }}</span>
                                </td>
                                <td>
                                    <span>{{ $demandado->correo }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="/demandados/ver/{{ $demandado->id }}"><button type="button" class="btn btn-primary btn-sm" title="Ver"><i class="fa fa-eye"></i></button></a>
                                    <button type="button" onclick="eliminar_demandado({{ $demandado->id }})" class="btn text-white bg-red btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $demandados->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection



