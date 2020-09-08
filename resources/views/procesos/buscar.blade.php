@extends('layouts.app')

@section('title_content') Buscar @endsection

@section('content')

<div class="section-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="buscar1" name="buscar" placeholder="Buscar...">
                        </div>
                        @isset($procesos)
                            <p class="mb-0">Resultados para la busqueda "{{ $busqueda }}"</p>
                        @endisset
                        <strong class="font-12">Encontrará los resultados en la parte inferior</strong>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Procesos" aria-expanded="true">Procesos</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Clientes" aria-expanded="true">Clientes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="Procesos" aria-expanded="false">
                        <div class="table-responsive">
                            <table class="table table-hover card-table table_custom">
                                <tbody>
                                    @if ( Request::is('buscar/*') )

                                        @if(!$procesos->isEmpty())
                                            @foreach ($procesos as $proceso)
                                                <tr>
                                                    <td>
                                                        <h6 class="mb-0"><a href="/procesos/ver/{{ $proceso->id }}">{{ $proceso->num_proceso }} - {{ $proceso->nombre }} - {{ $proceso->ciudad }}</a></h6>
                                                        <span class="text-green font-13">https://admin.obconsultores.com/procesos/ver/{{ $proceso->id }}</span>
                                                        <p class="mt-10 mb-0 text-muted">{{ $proceso->tipo }} - {{ $proceso->descripcion }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>
                                                    <h3 class="mb-0"><a href="javascript:void(0)">No se encontraron resutados para "{{ $busqueda ?? '' }}"</a></h3>
                                                    <span class="text-green font-13">https://admin.obconsultores.com/procesos/ver/{{ $proceso->id ?? '' }}</span>
                                                    <p class="mt-10 mb-0 text-muted">{{ $proceso->tipo ?? '' }} - {{ $proceso->descripcion ?? '' }}</p>
                                                </td>
                                            </tr>
                                        @endif

                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="Clientes" aria-expanded="false">
                        <div class="table-responsive">
                            <table class="table table-hover card-table table_custom">
                                <tbody>
                                    @if ( Request::is('buscar/*') )
                                    
                                        @if(!$clientes->isEmpty())
                                            @foreach ($clientes as $cliente)
                                                <tr>
                                                    <td>
                                                        <h6 class="mb-0"><a href="/clientes/ver/{{ $cliente->id }}">{{ $cliente->identificacion }} - {{ $cliente->nombre }}</a></h6>
                                                        <span class="text-green font-13">https://admin.obconsultores.com/clientes/ver/{{ $cliente->id }}</span>
                                                        <p class="mt-10 mb-0 text-muted">{{ $cliente->telefono }} - {{ $cliente->correo }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>
                                                    <h3 class="mb-0"><a href="javascript:void(0)">No se encontraron resutados para "{{ $busqueda ?? '' }}"</a></h3>
                                                    <span class="text-green font-13">https://admin.obconsultores.com/procesos/ver/{{ $proceso->id ?? '' }}</span>
                                                    <p class="mt-10 mb-0 text-muted">{{ $proceso->tipo ?? '' }} - {{ $proceso->descripcion ?? '' }}</p>
                                                </td>
                                            </tr>
                                        @endif

                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection



