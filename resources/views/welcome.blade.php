@extends('layouts.app')

@section('title_content') Dashboard @endsection

@section('PluginScripts') <script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script> @endsection
@section('myScripts') <script src="{{ asset('assets/js/chart/apex.js') }}"></script> @endsection

@section('content')

<div class="section-body">
    <div class="container-fluid">
        <h4>Bienvenido {{ \Auth::user()->name }}</h4>
    </div>
</div>

<div class="section-body mt-5">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-6 col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body ribbon">
                        <div class="ribbon-box green counter">{{ $clientes }}</div>
                        <a href="/clientes" class="my_sort_cut text-muted">
                            <i class="icon-users"></i>
                            <span>Clientes</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body ribbon">
                        <div class="ribbon-box orange counter">{{ $eventos }}</div>
                        <a href="/calendario" class="my_sort_cut text-muted">
                            <i class="icon-calendar"></i>
                            <span>Eventos</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body ribbon">
                        <div class="ribbon-box cyan counter">{{ $consultas }}</div>
                        <a href="/consultas" class="my_sort_cut text-muted">
                            <i class="icon-envelope-open"></i>
                            <span>Consultas</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Procesos</h3>
                    </div>
                    <div class="card-body">
                        <div id="apex-stacked-area"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Procesos por tipo</h3>
                    </div>
                    <div class="card-body">
                        <div id="apex-simple-donut"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Terceros</h3>
                    </div>
                    <div class="card-body">
                        <div id="apex-simple-pie"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Audiencias</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#No</th>
                                        <th>Cliente</th>
                                        <th>Telefono</th>
                                        <th>Tipo</th>
                                        <th>Fecha</th>
                                        <th>Observacion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($audiencias as $item)
                                        <tr>
                                            <td>{{ $item->procesos->num_proceso }}</td>
                                            <td>{{ $item->procesos->clientes->nombre }}</td>
                                            <td>{{ $item->procesos->clientes->telefono }}</td>
                                            <td>{{ $item->procesos->tipo }}</td>
                                            <td>{{ $item->fecha }}</td>
                                            <td>{{ $item->observaciones }}</td>
                                            <td><a href="/procesos/ver/{{ $item->procesos->id }}" class="btn btn-success btn-sm">Ir</a></td>
                                        </tr>
                                    @endforeach
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


