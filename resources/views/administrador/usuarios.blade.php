@extends('layouts.app')

@section('title_content') Usuarios @endsection

@section('myStyles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/multi-select/css/multi-select.css') }}"/>
@endsection

@section('myScripts') 
    <script src="{{ asset('assets/plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script> 
    <script src="{{ asset('assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script> 
    <script>$('#multiselect2').multiselect({ maxHeight: 300 });</script>
@endsection

@section('content')

<div class="section-body">
    
    <div class="col-lg-12">

        <a href="/"><button type="button" class="btn btn-primary mb-2"><i class="fa fa-arrow-circle-left mr-2"></i> Atras </button></a>

        <div class="card bg-none p-3">
            <div class="card-header">
                <h3 class="card-title">Usuarios</h3>
                <div class="card-options">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAddUsuario"> Agregar + </button>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive table_e2">
                    <table class="table table-hover table-vcenter table_custom spacing5 text-nowrap mb-3">
                        <thead>
                            <tr>
                                <th>#</th>                                    
                                <th>Nombre</th>                                    
                                <th>Correo</th>                                    
                                <th>Estado</th>                                    
                                <th>Rol</th>   
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>
                                    <span>{{ $usuario->identificacion }}</span>
                                </td>
                                <td>
                                    <span class="c_name ml-0"><span>{{ $usuario->name }}</span></span>
                                </td>
                                <td>
                                    <span>{{ $usuario->email }}</span>
                                </td>                                   
                                <td>
                                    <span>{{ $usuario->estado }}</span>
                                </td>
                                <td>
                                    <span>{{ $usuario->getRoleNames()[0] }}</span>
                                </td>
                                <td class="text-center">                                            
                                    <a href="javascript:void(0)"><button type="button" class="btn btn-primary btn-sm" title="Editar"><i class="fa fa-pencil"></i></button></a>
                                    {{-- <button type="button" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>
    
</div>

{{-- Modal para agregar usuario --}}
<div class="modal fade" id="ModalAddUsuario" tabindex="-1" role="dialog" aria-labelledby="ModalAddUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAddUsuarioLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/administrador/usuarios/create" method="post">
                @csrf

                <div class="modal-body">
                
                    <div class="form-group">
                        <label class="form-label">Identificacion</label>
                        <input type="number" class="form-control" name="identificacion" placeholder="Escriba la identificacion" required >
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name" placeholder="Escriba el nombre" required >
                    </div>
                    <div class="form-group">
                        <label class="form-label">Correo</label>
                        <input type="text" class="form-control" name="email" placeholder="Escriba el correo" >
                    </div>
                    <div class="form-group">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Escriba la contraseña" required >
                    </div>
                    <div class="form-group">
                        <label class="form-label">Rol</label>
                        <select name="rol" id="rol" class="form-control" required>
                            <option value="">Seleccione el rol</option>
                            <option value="admin">Administrador</option>
                            <option value="general">General</option>
                        </select>
                    </div>
                    <div class="form-group multiselect_div">
                        <label class="form-label">Permisos</label>
                        <select id="multiselect2" name="permisos[]" class="multiselect multiselect-custom" multiple="multiple" required>
                            @foreach (\Spatie\Permission\Models\Permission::all() as $permiso)
                                <option value="{{ $permiso->name }}">{{ $permiso->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
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



