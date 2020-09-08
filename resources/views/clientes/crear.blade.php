@extends('layouts.app')

@section('title_content') Crear @endsection

@section('content')

<div class="section-body">
    
    <form class="card" method="POST" action="/clientes/create" enctype="multipart/form-data">
        @csrf
        
        <div class="card-body">
            <h3 class="card-title">Crear Cliente</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Identificación</label>
                        <input type="number" class="form-control" id="identificacion" name="identificacion" placeholder="Escriba la identificación" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escriba el Nombre" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Escriba la Dirección" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Telefono</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Escriba el telefono" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Correo</label>
                        <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo" required>
                    </div>
                </div>

                <hr class="w-100">

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Cedula</label>
                        <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="cedula" id="cedula" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">EPS</label>
                        <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="eps" id="eps" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">ARL</label>
                        <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="arl" id="arl" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-0">
                        <label class="form-label">AFP</label>
                        <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="afp" id="afp" />
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary btn-lg">Crear</button>
        </div>
    </form>
    
</div>
    
@endsection



