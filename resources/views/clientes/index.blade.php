@extends('layouts.app')

@section('title_content') Clientes @endsection

@section('content')

<div class="section-body">
    
    <div class="col-lg-12">
        <div class="card bg-none p-3">
            <div class="card-header">
                <h3 class="card-title">Clientes</h3>
                <div class="card-options">
                    <a href="/clientes/crear"><button type="button" class="btn btn-primary"> Crear + </button></a>
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
                                <th>Correo</th>                                    
                                <th>Direccion</th>         
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td>
                                    <span>{{ $cliente->identificacion }}</span>
                                </td>
                                <td>
                                    <span class="c_name ml-0"><span>{{ $cliente->nombre }}</span></span>
                                </td>
                                <td>
                                    <span class="phone"><i class="fa fa-phone mr-2"></i>{{ $cliente->telefono }}</span>
                                </td>                                   
                                <td>
                                    <span>{{ $cliente->correo }}</span>
                                </td>
                                <td>
                                    <span>{{ $cliente->direccion }}</span>
                                </td>
                                <td class="text-center">                                            
                                    <a href="/clientes/ver/{{ $cliente->id }}"><button type="button" class="btn btn-primary btn-sm" title="Ver"><i class="fa fa-eye"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </div>
    
</div>
    
@endsection



