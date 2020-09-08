@extends('layouts.app')

@section('title_content') Procesos @endsection

@section('content')

<div class="section-body">
    
    <div class="col-lg-12">
        <div class="card bg-none p-3">
            <div class="card-header">
                <h3 class="card-title">Procesos {{ $proceso_name }}</h3>
                <div class="card-options">
                    <a href="/procesos/crear"><button type="button" class="btn btn-primary"> Crear + </button></a>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive table_e2">
                    <table class="table table-hover table-vcenter table_custom spacing5 text-nowrap mb-3">
                        <thead>
                            <tr>
                                <th>#</th>                                    
                                <th>Nombre</th>                                    
                                <th>Telefono</th>                                    
                                <th>Tipo</th>                                    
                                <th>Sub Tipo</th>                                    
                                <th>Ciudad</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($procesos as $proceso)
                            <tr>
                                <td>
                                    <span>{{ $proceso->num_proceso }}</span>
                                </td>
                                <td>
                                    <span class="c_name ml-0"><span>{{ $proceso->clientes['nombre'] }}</span></span>
                                </td>
                                <td>
                                    <span class="phone"><i class="fa fa-phone mr-2"></i>{{ $proceso->clientes['telefono'] }}</span>
                                </td>                                   
                                <td>
                                    <span>{{ $proceso->tipo }}</span>
                                </td>
                                <td>
                                    <span>{{ $proceso->sub_tipo }}</span>
                                </td>
                                <td>
                                    <span>{{ $proceso->ciudad }}</span>
                                </td>
                                <td class="text-center">                                            
                                    <a href="/procesos/ver/{{ $proceso->id }}"><button type="button" class="btn btn-primary btn-sm" title="Ver"><i class="fa fa-eye"></i></button></a>
                                    {{-- <button type="button" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $procesos->links() }}
                </div>
            </div>
        </div>
    </div>
    
</div>
    
@endsection



