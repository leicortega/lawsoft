@extends('layouts.app')

@section('title_content') Ver Demandado @endsection

@section('myStyles') <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote.css') }}"/> @endsection

@section('myScripts')
    <script src="{{ asset('assets/bundles/summernote.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/summernote/dist/lang/summernote-es-ES.js') }}"></script>
    <script src="{{ asset('assets/js/cliente.js') }}"></script>
    <script src="{{ asset('assets/js/demandados.js') }}"></script>
@endsection

@section('content')

<div class="section-body">

    <div class="col-lg-12">

        <a href="/demandados"><button type="button" class="btn btn-primary mb-2"><i class="fa fa-arrow-circle-left mr-2"></i> Atras </button></a>

        @if (session()->has('mensaje_enviado') && session()->has('mensaje_enviado') == 1)
            <div class="alert alert-success" id="confirmacion_mensaje_enviado" role="alert">
                <strong>Correo enviado correctamente</strong>
            </div>
        @endif

        {{-- <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">

                    <form action="/clientes/enviar_mensaje" id="form_enviar_mensaje" style="display: none" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h3 class="card-title">Enviar mensaje a {{ $demandado->nombre }} </h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="asunto" class="form-label">Asunto</label>
                                <textarea name="asunto" id="asunto" rows="3" placeholder="Escriba el asunto" class="form-control mb-2"></textarea>
                            </div>

                            <label class="form-label">Mensaje</label>

                            <input type="hidden" name="mensaje" id="mensaje" />

                            <div class="summernote"></div>

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="form-label">Adjunto</label>
                                    <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="adjunto_correo" id="adjunto_correo" />
                                </div>
                            </div>

                            <input type="hidden" name="id" id="id_mensaje_cliente" value="{{ $demandado->id }}">
                            <input type="hidden" name="correo" id="correo_mensaje_cliente" value="{{ $demandado->correo }}">

                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-success btn-lg mt-3" id="btn_enviar_mensaje">Enviar</button>
                                <button type="button" class="btn btn-secondary btn-lg ml-2 mt-3" onclick="document.getElementById('form_enviar_mensaje').style.display = 'none'">Cancelar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> --}}

        <div class="card">

            <form action="/demandados/update" method="POST" id="form_update_demandado" style="display: contents" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $demandado->id }}">

                <div class="card-header">
                    <h3 class="card-title">Demandado {{ $demandado->nombre }} </h3>
                    <div class="card-options">
                        {{-- <button type="button" class="btn btn-primary mr-2" onclick="habilitar_formularo_correo()"><i class="fa fa-envelope mr-2"></i> Enviar correo </button> --}}
                        <button type="button" class="btn btn-primary" id="btn_habilitar_actualizar_demandado" onclick="habilitar_formularo_demandado()"><i class="fe fe-edit mr-2"></i> Actualizar </button>
                        <button type="submit" class="btn text-white bg-green d-none" id="btn_enviar_actualizar_demandado"><i class="fe fe-check mr-2"></i> Enviar </button>
                        <button type="button" class="btn text-white bg-red ml-1 d-none" id="btn_cancelar_actualizar_demandado" onclick="deshabilitar_formularo_demandado()"><i class="fa fa-times"></i>  </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        @if (session()->has('update') && session('update') == 1)
                            <div class="alert alert-icon alert-success col-12" role="alert">
                                <i class="fe fe-check mr-2" aria-hidden="true"></i> Demandado actualizado correctamente
                            </div>
                        @endif

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Identificacion</label>
                                <input type="number" class="form-control" name="identificacion" id="identificacion" required readonly value="{{ $demandado->identificacion }}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required readonly value="{{ $demandado->nombre }}">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Telefono</label>
                                <input type="number" class="form-control" name="telefono" id="telefono" readonly value="{{ $demandado->telefono }}">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correo" id="correo" readonly value="{{ $demandado->correo }}">
                            </div>
                        </div>

                        <input type="hidden" name="demandado_id" value="{{ $demandado->id }}">

                        <hr class="w-100">

                    </div>
                </div>

            </form>

        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Abogados </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-vcenter table-striped">
                            <thead>
                                <tr>
                                    <th>Identificacion abogado</th>
                                    <th>Nombre demandado</th>
                                    <th>Telefono demandado</th>
                                    <th>Correo demandado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($detalle_procesos as $abogado)
                                    <tr>
                                        <td>
                                            <span>{{ $abogado->abogados->identificacion }}</span>
                                        </td>
                                        <td>
                                            <span class="c_name ml-0"><span>{{ $abogado->abogados->nombre }}</span></span>
                                        </td>
                                        <td>
                                            <span class="phone"><i class="fa fa-phone mr-2"></i>{{ $abogado->abogados->telefono }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $abogado->abogados->correo }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="/demandados/ver/{{ $abogado->abogados->id }}"><button type="button" class="btn btn-primary btn-sm" title="Ver"><i class="fa fa-eye"></i></button></a>
                                            {{-- <button type="button" onclick="eliminar_demandado({{ $demandado->id }})" class="btn text-white bg-red btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button> --}}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Procesos </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-vcenter table-striped">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Fecha</th>
                                    <th>Tipo</th>
                                    <th>Ciudad</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($detalle_procesos as $proceso)
                                    <tr>
                                        <td class="width40">{{ $proceso->procesos->num_proceso }}</td>
                                        <td>{{ \Carbon\Carbon::parse($proceso->procesos->created_at)->format('d/m/Y') }}</td>
                                        <td>{{ $proceso->procesos->tipo }}</td>
                                        <td>{{ $proceso->procesos->ciudad }}</td>
                                        <td>{{ $proceso->procesos->descripcion }}</td>
                                        <td>
                                            <a href="/procesos/ver/{{ $proceso->procesos->id }}"><button type="button" class="btn btn-primary btn-sm" title="Ver"><i class="fa fa-eye"></i></button></a>
                                        </td>

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

@endsection



