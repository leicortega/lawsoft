@extends('layouts.app')

@section('title_content') Ver Consulta @endsection

@section('myStyles') <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote.css') }}"/> @endsection

@section('myScripts')
    <script src="{{ asset('assets/plugins/summernote/dist/summernote.js') }}"></script>
    <script src="{{ asset('assets/plugins/summernote/dist/lang/summernote-es-ES.js') }}"></script>
    <script src="{{ asset('assets/js/consultas.js') }}"></script>
@endsection

@section('content')

<div class="section-body">

    <div class="col-lg-12">

        <a href="{{ url()->previous() }}"><button type="button" class="btn btn-primary mb-2"><i class="fa fa-arrow-circle-left mr-2"></i> Atras </button></a>

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Consulta #{{ $consulta->id }} </h3>
            </div>
            <div class="card-body">
                <div class="row">

                    @if (session()->has('update') && session('update') == 1)
                        <div class="alert alert-icon alert-success col-12" role="alert">
                            <i class="fe fe-check mr-2" aria-hidden="true"></i> Cliente actualizado correctamente
                        </div>
                    @endif

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Fecha</label>
                            <input type="date" class="form-control" required readonly value="{{ $consulta->fecha }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" required readonly value="{{ $consulta->nombre }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Telefono</label>
                            <input type="number" class="form-control" required readonly value="{{ $consulta->telefono }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Correo</label>
                            <input type="email" class="form-control" required readonly value="{{ $consulta->correo }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label">Asunto</label>
                            <textarea name="" id="" class="form-control" rows="3" readonly>{{ $consulta->asunto }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label">Asunto</label>
                            <textarea name="" id="" class="form-control" cols="30" rows="10" readonly>{{ $consulta->mensaje }}</textarea>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Responder </h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success d-none" id="confirmacion_respuesta_enviada" role="alert">
                            <strong>Respuesta enviada correctamente</strong>
                        </div>
                        <form action="/consultas/responder/" id="form_enviar_respuesta" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="summernote">
                                Escriba la respuesta aquí.
                            </div>

                            <input type="hidden" name="content" id="content">

                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label class="form-label">Adjunto</label>
                                    <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="adjunto_correo" id="adjunto_correo" />
                                </div>
                            </div>

                            <input type="hidden" name="id" id="id" value="{{ $consulta->id }}">
                            <input type="hidden" name="correo" id="correo" value="{{ $consulta->correo }}">

                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-success btn-lg mt-3" id="btn_enviar_respuesta">Enviar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection



