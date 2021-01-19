@extends('layouts.app')

@section('title_content') Crear Cliente @endsection

@section('myScripts') <script src="{{ asset('assets/js/cliente.js') }}"></script> @endsection

@section('content')

<div class="section-body">

    <a href="{{ url()->previous() }}"><button type="button" class="btn btn-primary mb-2"><i class="fa fa-arrow-circle-left mr-2"></i> Atras </button></a>

    <form class="card" method="POST" action="/clientes/create" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <h3 class="card-title">Crear Cliente</h3>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">Tipo persona</label>
                        <select name="tipo_cliente" id="tipo_cliente" onchange="select_tipo_persona(this.value)" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Natural">Natural</option>
                            <option value="Juridica">Juridica</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label" id="tipo_cliente_label">Identificación</label>
                        <input type="number" class="form-control" id="identificacion" name="identificacion" placeholder="Escriba la identificación" required>
                        <div class="invalid-feedback">El Usuario ya esta creado</div>
                    </div>
                </div>
                <div class="col-md-1 d-none" id="verificacion">
                    <div class="form-group">
                        <label class="form-label">D.V.</label>
                        <input type="number" class="form-control" name="verificacion" placeholder="Verificación" >
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escriba el Nombre" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Escriba la Dirección" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Telefono</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Escriba el telefono">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Celular</label>
                        <input type="number" class="form-control" name="celular" id="celular" placeholder="Escriba el celular">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Correo 1 </label>
                        <input type="text" class="form-control" name="correo" id="correo" placeholder="Escriba el Correo" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Correo 2 </label>
                        <input type="text" class="form-control" name="correo_dos" id="correo_dos" placeholder="Escriba el Correo">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">EPS</label>
                        <select class="form-control custom-select" name="eps" id="eps" >
                            <option value="">Seleccione EPS</option>
                            <option value="ALIANSALUD">ALIANSALUD</option>
                            <option value="COMFENALCO VALLE E.P.S.">COMFENALCO VALLE E.P.S.</option>
                            <option value="SURAMERICANA">SURAMERICANA</option>
                            <option value="CAFE SALUD">CAFE SALUD</option>
                            <option value="COLPATRIA">COLPATRIA</option>
                            <option value="COMPENSAR">COMPENSAR</option>
                            <option value="CRUZ BLANCA">CRUZ BLANCA</option>
                            <option value="SALUD TOTAL">SALUD TOTAL</option>
                            <option value="SANITAS">SANITAS</option>
                            <option value="COOMEVA">COOMEVA</option>
                            <option value="NUEVA EPS">NUEVA EPS</option>
                            <option value="MEDIMAS">MEDIMAS</option>
                            <option value="SALUD COOP">SALUD COOP</option>
                            <option value="CAFE SALUD">CAFE SALUD</option>
                            <option value="ASMET SALUD">ASMET SALUD</option>
                            <option value="ASOCIACION INDIGENA DEL CAUCA">ASOCIACION INDIGENA DEL CAUCA</option>
                            <option value="CAFAM">CAFAM</option>
                            <option value="CAJA DE COMPENSACION FAMILIAR DEL HUILA 'COMFAMILIAR'">CAJA DE COMPENSACION FAMILIAR DEL HUILA 'COMFAMILIAR'</option>
                            <option value="CAPRESOCA">CAPRESOCA</option>
                            <option value="COMPARTA">COMPARTA</option>
                            <option value="ECOOPSOS">ECOOPSOS</option>
                            <option value="CAPRECOM">CAPRECOM</option>
                            <option value="COLSUBSIDIO">COLSUBSIDIO</option>
                            <option value="COMFACUNDI">COMFACUNDI</option>
                            <option value="CONVIDA">CONVIDA</option>
                            <option value="HUMANA VIVIR">HUMANA VIVIR</option>
                            <option value="SALUD VIDA">SALUD VIDA</option>
                            <option value="SOL SALUD">SOL SALUD</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">ARL</label>
                        <select class="form-control custom-select" name="arl" id="arl">
                            <option value="">Seleccione ARL</option>
                            <option value="Axa Colpatria Seguros S.A.">Axa Colpatria Seguros S.A.</option>
                            <option value="Colmena Seguros">Colmena Seguros</option>
                            <option value="Compañía de Seguros de Vida Aurora S.A.">Compañía de Seguros de Vida Aurora S.A.</option>
                            <option value="Seguros Bolívar S.A.">Seguros Bolívar S.A.</option>
                            <option value="La Equidad Seguros Generales Organismo Cooperativo">La Equidad Seguros Generales Organismo Cooperativo</option>
                            <option value="Positiva Compañía de Seguros S.A.">Positiva Compañía de Seguros S.A.</option>
                            <option value="Seguros ALFA S.A. y Seguros de Vida ALFA S.A.">Seguros ALFA S.A. y Seguros de Vida ALFA S.A.</option>
                            <option value="Seguros Generales Suramericana S.A.">Seguros Generales Suramericana S.A.</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">AFP</label>
                        <select class="form-control custom-select" name="afp" id="afp">
                            <option value="">Seleccione AFP</option>
                            <option value="Colpensiones">Colpensiones</option>
                            <option value="Protección S.A.">Protección S.A.</option>
                            <option value="Porvenir S.A.">Porvenir S.A.</option>
                            <option value="Colfondos Pensiones y Cesantías">Colfondos Pensiones y Cesantías</option>
                            <option value="Old Mutual">Old Mutual</option>
                        </select>
                    </div>
                </div>

                <hr class="w-100">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Cedula</label>
                        <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="cedula" id="cedula" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Camara de comercio</label>
                        <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="contrato" id="contrato" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Rut</label>
                        <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="poder" id="poder" />
                    </div>
                </div>

                {{-- <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Titulo Valor</label>
                        <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="titulo_valor" id="titulo_valor" />
                    </div>
                </div> --}}

            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
        </div>
    </form>

</div>

@endsection


