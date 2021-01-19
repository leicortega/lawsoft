@extends('layouts.app')

@section('title_content') Consultas @endsection

@section('content')

<div class="section-body">

    <div class="col-lg-12">
        <a href="/"><button type="button" class="btn btn-primary mb-2"><i class="fa fa-arrow-circle-left mr-2"></i> Atras </button></a>

        <div class="card-body">
            <div class="d-md-flex justify-content-between">
                <ul class="nav nav-tabs b-none">
                    <li class="nav-item"><a class="nav-link {{ Request::is('consultas') ? 'active' : '' }}" id="list-tab" href="/consultas"><i class="fa fa-list-ul"></i> Nuevas</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('consultas/contestadas') ? 'active' : '' }}" id="grid-tab" href="/consultas/contestadas"><i class="fa fa-check-square-o"></i> Contestadas</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('consultas/conversaciones') ? 'active' : '' }}" id="addnew-tab" href="/consultas/conversaciones"><i class="fa fa-clone"></i> Conversaciones</a></li>
                </ul>
            </div>
            <div class="input-group mt-2">
                <input type="text" class="form-control search" placeholder="Buscar...">
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade {{ Request::is('consultas') ? 'active show' : '' }}" id="consultas_nuevas" role="tabpanel">
                <div class="card bg-none p-3">
                    <div class="card-header">
                        <h3 class="card-title">Consultas Nuevas</h3>
                        <div class="card-options">
                        </div>
                    </div>
                    <div class="card-body pt-0">

                        <div class="alert alert-icon alert-success col-12 d-none" id="delete_confirmed" role="alert">
                            <i class="fe fe-check mr-2" aria-hidden="true"></i> Cliente eliminado correctamente
                        </div>

                        <div class="table-responsive table_e2">
                            <table class="table table-hover table-vcenter table_custom spacing5 text-nowrap mb-3">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Asunto</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultas as $consulta)
                                    <tr>
                                        <td>
                                            <span>{{ $consulta->fecha }}</span>
                                        </td>
                                        <td>
                                            <span class="c_name ml-0"><span>{{ $consulta->nombre }}</span></span>
                                        </td>
                                        <td>
                                            <span class="phone"><i class="fa fa-phone mr-2"></i>{{ $consulta->telefono }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $consulta->correo }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $consulta->asunto }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="/consultas/ver/{{ $consulta->id }}"><button type="button" class="btn btn-primary btn-sm" title="Ver"><i class="fa fa-eye"></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $consultas->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade {{ Request::is('consultas/contestadas') ? 'active show' : '' }}" id="consultas_contestadas" role="tabpanel">

                @if (session()->has('mensaje_enviado') && session()->has('mensaje_enviado') == 1)
                    <div class="alert alert-success" id="confirmacion_mensaje_enviado" role="alert">
                        <strong>Respuesta enviada correctamente</strong>
                    </div>
                @endif

                <div class="card bg-none p-3">
                    <div class="card-header">
                        <h3 class="card-title">Consultas Contestadas</h3>
                        <div class="card-options">
                        </div>
                    </div>
                    <div class="card-body pt-0">

                        <div class="alert alert-icon alert-success col-12 d-none" id="delete_confirmed" role="alert">
                            <i class="fe fe-check mr-2" aria-hidden="true"></i> Cliente eliminado correctamente
                        </div>

                        <div class="table-responsive table_e2">
                            <table class="table table-hover table-vcenter table_custom spacing5 text-nowrap mb-3">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Asunto</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultas as $consulta)
                                    @if ($consulta->respuestas->count() != 0)
                                        <?php break; ?>
                                    @endif
                                    <tr>
                                        <td>
                                            <span>{{ $consulta->fecha }}</span>
                                        </td>
                                        <td>
                                            <span class="c_name ml-0"><span>{{ $consulta->nombre }}</span></span>
                                        </td>
                                        <td>
                                            <span class="phone"><i class="fa fa-phone mr-2"></i>{{ $consulta->telefono }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $consulta->correo }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $consulta->asunto }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="/consultas/ver/{{ $consulta->id }}"><button type="button" class="btn btn-primary btn-sm" title="Ver"><i class="fa fa-eye"></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $consultas->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade {{ Request::is('consultas/conversaciones') ? 'active show' : '' }}" id="consultas_conversaciones" role="tabpanel">
                <div class="card bg-none p-3">
                    <div class="card-header">
                        <h3 class="card-title">Conversaciones</h3>
                        <div class="card-options">
                        </div>
                    </div>
                    <div class="card-body pt-0">

                        <div class="alert alert-icon alert-success col-12 d-none" id="delete_confirmed" role="alert">
                            <i class="fe fe-check mr-2" aria-hidden="true"></i> Cliente eliminado correctamente
                        </div>

                        <div class="table-responsive table_e2">
                            <table class="table table-hover table-vcenter table_custom spacing5 text-nowrap mb-3">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Asunto</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultas as $consulta)
                                    @if ($consulta->respuestas->count() == 0)
                                        <?php break; ?>
                                    @endif
                                    <tr>
                                        <td>
                                            <span>{{ $consulta->fecha }}</span>
                                        </td>
                                        <td>
                                            <span class="c_name ml-0"><span>{{ $consulta->nombre }}</span></span>
                                        </td>
                                        <td>
                                            <span class="phone"><i class="fa fa-phone mr-2"></i>{{ $consulta->telefono }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $consulta->correo }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $consulta->asunto }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="/consultas/ver/{{ $consulta->id }}"><button type="button" class="btn btn-primary btn-sm" title="Ver"><i class="fa fa-eye"></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $consultas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection



