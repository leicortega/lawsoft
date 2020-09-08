@extends('layouts.app')

@section('title_content') Clientes @endsection

@section('content')

<div class="section-body">
    
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Cliente {{ $cliente->nombre }} </h3>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Identificacion</label>
                            <input type="text" class="form-control" readonly value="{{ $cliente->identificacion }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" readonly value="{{ $cliente->nombre }}">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Telefono</label>
                            <input type="email" class="form-control" readonly value="{{ $cliente->telefono }}">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Correo</label>
                            <input type="text" class="form-control" readonly value="{{ $cliente->correo }}">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Direccion</label>
                            <input type="text" class="form-control" readonly value="{{ $cliente->direccion }}">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="file_folder row">
                            @if ( $cliente->cedula )
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/docs/clientes/documentos/'.$cliente->cedula) }}" target="_blank">
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
                                            <input type="hidden" name="id" value="{{ $cliente->id }}">
                                            <button type="submit" class="btn btn-primary btn-block mt-2">Subir Cedula</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            
                            @if ( $cliente->eps )
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/docs/clientes/documentos/'.$cliente->eps) }}" target="_blank">
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
                                            <input type="hidden" name="id" value="{{ $cliente->id }}">
                                            <button type="submit" class="btn btn-primary btn-block mt-2">Subir EPS</button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            @if ( $cliente->arl )
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/docs/clientes/documentos/'.$cliente->arl) }}" target="_blank">
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
                                            <input type="hidden" name="id" value="{{ $cliente->id }}">
                                            <button type="submit" class="btn btn-primary btn-block mt-2">Subir ARL</button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            @if ( $cliente->afp )
                                <div class="col-md-3">
                                    <a href="{{ asset('storage/docs/clientes/documentos/'.$cliente->afp) }}" target="_blank">
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
                                            <input type="hidden" name="id" value="{{ $cliente->id }}">
                                            <button type="submit" class="btn btn-primary btn-block mt-2">Subir AFP</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <hr class="w-100">              

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

                                @isset($cliente->procesos[0])
                                    @foreach ($cliente->procesos as $proceso)
                                        <tr>
                                            <td class="width40">{{ $proceso->num_proceso }}</td>
                                            <td>{{ \Carbon\Carbon::parse($proceso->created_at)->format('d/m/Y') }}</td>
                                            <td>{{ $proceso->tipo }}</td>
                                            <td>{{ $proceso->ciudad }}</td>
                                            <td>{{ $proceso->descripcion }}</td>
                                            <td>
                                                <a href="/procesos/ver/{{ $proceso->id }}"><button type="button" class="btn btn-primary btn-sm" title="Ver"><i class="fa fa-eye"></i></button></a>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                @endisset
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
    
@endsection



