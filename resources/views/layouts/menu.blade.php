<div id="left-sidebar" class="sidebar">
    <div class="d-flex justify-content-between brand_name py-2">
        <h5 class="brand-name">ObConsultores</h5>
    </div>
    <div class="input-icon">
        <span class="input-icon-addon">
            <i class="fe fe-search"></i>
        </span>
        <input type="text" class="form-control" id="buscar" placeholder="Buscar...">
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="all-tab">
            <nav class="sidebar-nav">
                <ul class="metismenu ci-effect-1">
                    <li class="g_heading mb-2">Modulos</li>
                    <li><a href="/"><i class="icon-home"></i><span data-hover="Inicio">Inicio</span></a></li>
                    <li>
                        <a href="javascript:void(0)" class="has-arrow arrow-b"><i class="icon-drawer"></i><span data-hover="Procesos">Procesos</span></a>
                        <ul aria-expanded="false" class="collapse">

                                <li><a href="/procesos/crear"><span data-hover="Crear">Crear</span></a></li>
                                <hr class="w-100">

                            @canany(['civil', 'universal'])
                                <li><a href="/procesos/civil"><span data-hover="Civil">Civil</span></a></li>
                            @endcanany
                            @canany(['familia', 'universal'])
                                <li><a href="/procesos/familia"><span data-hover="Familia">Familia</span></a></li>
                            @endcanany
                            @canany(['laboral', 'universal'])
                                <li><a href="/procesos/laboral"><span data-hover="Laboral">Laboral</span></a></li>
                            @endcanany
                            @canany(['seguridad social', 'universal'])
                                <li><a href="/procesos/seguridad-social"><span data-hover="SeguridadSocial">Seguridad Social</span></a></li>
                            @endcanany
                            @canany(['administrativo', 'universal'])
                                <li><a href="/procesos/administrativo"><span data-hover="Administrativo">Administrativo</span></a></li>
                            @endcanany
                            @canany(['penal', 'universal'])
                                <li><a href="/procesos/penal"><span data-hover="Penal">Penal</span></a></li>
                            @endcanany
                        </ul>
                    </li>

                    @canany(['clientes', 'universal'])
                        <li><a href="/clientes"><i class="icon-user"></i><span data-hover="Clientes">Clientes</span></a></li>
                    @endcanany

                    @role('admin')
                    <li class="g_heading mb-2">Administrador</li>
                    
                    <li><a href="/administrador/usuarios"><i class="icon-users"></i><span data-hover="Usuarios">Usuarios</span></a></li>
                    @endrole

                </ul>
            </nav>
        </div>
    </div>
</div>