@extends('layouts.app')

@section('title_content') Procesos @endsection

@section('myStyles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"/>
@endsection

@section('myScripts') 
    <script src="{{ asset('assets/js/procesos.js') }}"></script> 
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script> 
@endsection

@section('content')

<div class="section-body">
    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Proceso {{ $proceso[0]->tipo }} {{ $proceso[0]->num_proceso }}</h3>
                <div class="row">

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Identificacion</label>
                            <input type="text" class="form-control" readonly value="{{ $proceso[0]->clientes->identificacion }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" readonly value="{{ $proceso[0]->clientes->nombre }}">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Telefono</label>
                            <input type="email" class="form-control" readonly value="{{ $proceso[0]->clientes->telefono }}">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Correo</label>
                            <input type="text" class="form-control" readonly value="{{ $proceso[0]->clientes->correo }}">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Direccion</label>
                            <input type="text" class="form-control" readonly value="{{ $proceso[0]->clientes->direccion }}">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="file_folder row">
                            @if ( $proceso[0]->clientes->cedula )
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/docs/clientes/documentos/'.$proceso[0]->clientes->cedula) }}" target="_blank">
                                        <div class="icon">
                                            <i class="fa fa-file-o text-primary"></i>
                                        </div>
                                        <div class="file-name">
                                            <p class="mb-0 text-muted">Cedula</p>
                                            <small>Size: 68KB</small>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <form action="/clientes/add-cedula" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <label class="form-label">Cedula</label>
                                            <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="cedula" id="cedula" required />
                                            <input type="hidden" name="id" value="{{ $proceso[0]->clientes->id }}">
                                            <button type="submit" class="btn btn-primary btn-block mt-2">Subir Cedula</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            
                            @if ( $proceso[0]->clientes->eps )
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/docs/clientes/documentos/'.$proceso[0]->clientes->eps) }}" target="_blank">
                                        <div class="icon">
                                            <i class="fa fa-file-o text-primary"></i>
                                        </div>
                                        <div class="file-name">
                                            <p class="mb-0 text-muted">EPS</p>
                                            <small>Size: 68KB</small>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <form action="/clientes/add-eps" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <label class="form-label">EPS</label>
                                            <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="eps" id="eps" required />
                                            <input type="hidden" name="id" value="{{ $proceso[0]->clientes->id }}">
                                            <button type="submit" class="btn btn-primary btn-block mt-2">Subir EPS</button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            @if ( $proceso[0]->clientes->arl )
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/docs/clientes/documentos/'.$proceso[0]->clientes->arl) }}" target="_blank">
                                        <div class="icon">
                                            <i class="fa fa-file-o text-primary"></i>
                                        </div>
                                        <div class="file-name">
                                            <p class="mb-0 text-muted">ARL</p>
                                            <small>Size: 68KB</small>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <form action="/clientes/add-arl" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <label class="form-label">ARL</label>
                                            <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="arl" id="arl" required />
                                            <input type="hidden" name="id" value="{{ $proceso[0]->clientes->id }}">
                                            <button type="submit" class="btn btn-primary btn-block mt-2">Subir ARL</button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            @if ( $proceso[0]->clientes->afp )
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/docs/clientes/documentos/'.$proceso[0]->clientes->afp) }}" target="_blank">
                                        <div class="icon">
                                            <i class="fa fa-file-o text-primary"></i>
                                        </div>
                                        <div class="file-name">
                                            <p class="mb-0 text-muted">AFP</p>
                                            <small>Size: 68KB</small>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <form action="/clientes/add-afp" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <label class="form-label">AFP</label>
                                            <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="afp" id="afp" required />
                                            <input type="hidden" name="id" value="{{ $proceso[0]->clientes->id }}">
                                            <button type="submit" class="btn btn-primary btn-block mt-2">Subir AFP</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <hr class="w-100">

                    <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Tipo</label>
                            <input type="text" class="form-control" readonly value="{{ $proceso[0]->tipo }}">
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Sub Tipo</label>
                            <input type="text" class="form-control" readonly value="{{ $proceso[0]->sub_tipo }}">
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Departamento</label>
                            <input type="text" class="form-control" readonly value="{{ $proceso[0]->departamento }}">
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Ciudad</label>
                            <input type="text" class="form-control" readonly value="{{ $proceso[0]->ciudad }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-0">
                            <label class="form-label">Descripcion y Observaciones</label>
                            <textarea rows="2" class="form-control" readonly>{{ $proceso[0]->descripcion }}</textarea>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="file_folder">
                            <a href="{{ asset('storage/'.$proceso[0]->proceso_file) }}" target="_blank">
                                <div class="icon">
                                    <i class="fa fa-file-o text-primary"></i>
                                </div>
                                <div class="file-name">
                                    <p class="mb-0 text-muted">Archivo de Proceso</p>
                                    <small>Size: 68KB</small>
                                </div>
                            </a>
                        </div>
                    </div>

                    <hr class="w-100">

                    <h3 class="card-title col-12">Responsable</h3>   

                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Identificacion</label>
                            <input type="email" class="form-control" readonly value="{{ $proceso[0]->users->identificacion }}">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" readonly value="{{ $proceso[0]->users->name }}">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Correo</label>
                            <input type="text" class="form-control" readonly value="{{ $proceso[0]->users->email }}">
                        </div>
                    </div>               

                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Actuaciones </h3>
                        <div class="card-options">                                
                            <button type="button" onclick="agregar_actuacion({{ $proceso[0]->id }})" class="btn btn-primary">Agregar +</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-vcenter table-striped">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Actuación</th>
                                    <th>Anotación</th>
                                    <th>Fecha Inicio Termino</th>
                                    <th>Fecha Fin Termino</th>
                                    <th>Archivo</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($proceso[0]->actuaciones)
                                    @foreach ($proceso[0]->actuaciones as $actuacion)
                                        <tr>
                                            <td class="width40">{{ $actuacion->fecha }}</td>
                                            <td>{{ $actuacion->actuacion }}</td>
                                            <td>{{ $actuacion->anotacion }}</td>
                                            <td>{{ $actuacion->f_inicio_termino }}</td>
                                            <td>{{ $actuacion->f_fin_termino }}</td>
                                            <td class="text-center"><a href="/storage/{{ $actuacion->anotacion_file }}" target="_blank"><i class="fa fa-file"></i></a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

{{-- Modal para agregar actuacion --}}
<div class="modal fade" id="ModalAddActuacion" tabindex="-1" role="dialog" aria-labelledby="ModalAddActuacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAddActuacionLabel">Agregar Actuacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/procesos/agregar_actuacion" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                
                    <div class="form-group">
                        <label class="form-label">Fecha</label>
                        <input data-provide="datepicker" data-date-format='yyyy-mm-dd' data-date-autoclose="true" name="fecha" class="form-control" placeholder="MM/DD/AAAA" required autocomplete="off" >
                    </div>
                    <div class="form-group">
                        <label class="form-label">Actuacion</label>
                        <input type="text" class="form-control" name="actuacion" placeholder="Escriba la actuación" required >
                    </div>
                    <div class="form-group">
                        <label class="form-label">Anotacion</label>
                        <textarea rows="3" placeholder="Escriba la anotación" class="form-control" name="anotacion" required ></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Fecha Inicio Termino</label>
                            <input data-provide="datepicker" autocomplete="off" data-date-format='yyyy-mm-dd' data-date-autoclose="true" name="f_inicio_termino" class="form-control" placeholder="MM/DD/AAAA" required >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Fecha Fin Termino</label>
                            <input data-provide="datepicker" autocomplete="off" data-date-format='yyyy-mm-dd' data-date-autoclose="true" name="f_fin_termino" class="form-control" placeholder="MM/DD/AAAA" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Archivo de la anotación</label>
                        <input type="file" class="form-control" accept="application/pdf, .doc, .docx" name="anotacion_file" id="anotacion_file" >
                    </div>

                    <input type="hidden" name="procesos_id" id="procesos_id">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection



