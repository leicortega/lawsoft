@extends('layouts.app')

@section('title_content') Crear @endsection

@section('myScripts') <script src="{{ asset('assets/js/procesos.js') }}"></script> @endsection

@section('content')

<div class="section-body">
    
    <form class="card" method="POST" action="/procesos/create" id="form_crear_proceso" enctype="multipart/form-data">
        @csrf
        
        <div class="card-body">
            <h3 class="card-title">Crear Proceso</h3>
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

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Area</label>
                        <select class="form-control custom-select" name="tipo" onchange="cargar_subarea(this.value)" required>
                            <option value="">Seleccione el area</option>
                            <option value="Civil">Civil</option>
                            <option value="Familia">Familia</option>
                            <option value="Laboral">Laboral</option>
                            <option value="Seguridad Social">Seguridad Social</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Penal">Penal</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Sub Area</label>
                        <select class="form-control custom-select" name="sub_tipo" id="sub_tipo">
                            <option value="">Debe seleccionar el area</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Departamento</label>
                        <select class="form-control custom-select" name="departamento" id="departamento" onchange="cargarMunicipios(this.value)" required>
                            <option value="">Seleccione el departamento</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Ciudad</label>
                        <select class="form-control custom-select" name="ciudad" id="municipio" required>
                            <option value="">Debe seleccionar el departamento</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-0">
                        <label class="form-label">Observaciones o descripción</label>
                        <textarea rows="5" class="form-control" name="descripcion" placeholder="Escriba las observaciones o descripcion"></textarea>
                    </div>
                </div>

                <hr class="w-100">

                <div class="col-md-12">
                    <div class="form-group mb-0">
                        <label class="form-label">Archivo del proceso</label>
                        <input type="file" class="form-control" accept="application/pdf, .doc, .docx" name="proceso_file" id="proceso_file" required>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary btn-lg" id="btn_crear_proceso">Crear</button>
        </div>
    </form>
    
</div>
    
@endsection



