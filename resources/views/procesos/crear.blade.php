@extends('layouts.app')

@section('title_content') Crear Proceso @endsection

@section('myScripts')
    <script src="{{ asset('assets/js/procesos.js') }}"></script>

    {{-- Si el cliente viene por la url --}}
    <?php echo $_GET['cliente'] ? '<script>$("#identificacion").val('.$_GET['cliente'].'); buscar_cliente();</script>' : ''; ?>
@endsection

@section('content')

<div class="section-body">

    <a href="{{ url()->previous() }}"><button type="button" class="btn btn-primary mb-2"><i class="fa fa-arrow-circle-left mr-2"></i> Atras </button></a>

    <form class="card" method="POST" action="/procesos/create" id="form_crear_proceso" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <h3 class="card-title">Crear Proceso</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Identificación</label>
                        <input type="number" class="form-control" id="identificacion" name="identificacion" placeholder="Escriba la identificación" readonly required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escriba el Nombre" readonly required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Escriba la Dirección" readonly required>
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
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Telefono</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Escriba el telefono" readonly >
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Celular</label>
                        <input type="number" class="form-control" name="celular" id="celular" placeholder="Escriba el celular" readonly >
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Correo 1</label>
                        <input type="text" class="form-control" name="correo" id="correo" placeholder="Escriba el Correo" readonly required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Correo 2</label>
                        <input type="text" class="form-control" name="correo_dos" id="correo_dos" placeholder="Escriba el Correo" readonly >
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">EPS</label>
                        <select class="form-control custom-select" name="eps" id="eps" readonly>
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
                        <select class="form-control custom-select" name="arl" id="arl" readonly>
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
                        <select class="form-control custom-select" name="afp" id="afp" readonly>
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

                <div style="display: -webkit-inline-box !important;">
                    <div class="form-group col-3">
                        <input type="number" id="cantidad_demandantes" name="cantidad_demandantes" class="form-control" value="1" >
                    </div>
                    <button type="button" class="btn btn-primary mb-2" onclick="agregar_demandantes()">Agregar demandante +</button>
                </div>

                <div class="card p-5 collapse" id="agg_demandante" style="border: solid 1px #cda854;background: #e9ecef !important;">

                    <div id="content_demandantes">

                    </div>

                </div>

                <div style="display: -webkit-inline-box !important;">
                    <div class="form-group col-3">
                        <input type="number" id="cantidad_demandados" name="cantidad_demandados" class="form-control" value="1" >
                    </div>
                    <button type="button" class="btn btn-primary mb-2" onclick="agregar_demandados()">Agregar demandado +</button>
                </div>


                <div class="card p-5 collapse" id="agg_demandado" style="border: solid 1px #cda854;background: #e9ecef !important;">

                    <div id="content_demandados">

                    </div>

                </div>

                <hr class="w-100">

                <div class="col-md-6" id="section_area">
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
                            <option value="Derecho de Petición">Derecho de Petición</option>
                            <option value="Acción de Tutela">Acción de Tutela</option>
                            <option value="Insolvencia">Insolvencia</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6" id="section_subarea">
                    <div class="form-group">
                        <label class="form-label">Clase de proceso</label>
                        <select class="form-control custom-select" name="sub_tipo" id="sub_tipo" onchange="cargar_tipo(this.value)">
                            <option value="">Debe seleccionar el area</option>
                        </select>
                    </div>
                </div>

                <div id="section_tipo"></div>

                <div class="col-md-12">
                    <div class="form-group mb-0">
                        <label class="form-label">Observaciones o descripción</label>
                        <textarea rows="10" class="form-control" name="descripcion" placeholder="Escriba las observaciones o descripcion"></textarea>
                    </div>
                </div>

                <hr class="w-100">

                <div class="col-md-12 d-flex mb-2">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Archivo del proceso</label>
                            <input type="file" class="form-control" accept="application/pdf, .doc, .docx" name="proceso_file" id="proceso_file" >
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Contrato</label>
                            <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="contrato" id="contrato" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Poder</label>
                            <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="poder" id="poder" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Titulo valor</label>
                            <input type="file" class="form-control" accept="application/pdf,image/png,image/jpg,image/jpeg" name="titulo_valor" id="titulo_valor" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-0">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="notificacion" checked="" />
                            <span class="custom-control-label">Enviar notificación al correo</span>
                        </label>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary btn-lg" id="btn_crear_proceso">Agregar</button>
        </div>
    </form>

</div>

@endsection



