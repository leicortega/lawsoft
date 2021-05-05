<div id="header_top" class="header_top dark">
    <div class="container">
        <div class="hleft">
            <div class="dropdown">
                <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="{{ asset('assets/images/lawsoft.png') }}" alt=""/></a>
                <a href="/buscar" class="nav-link icon"><i class="fa fa-search"></i></a>
                <a href="/" class="nav-link icon"><i class="fa fa-home"></i></a>
                <a href="/chat" class="nav-link icon xs-hide"><i class="fa fa-comments"></i></a>
                {{-- <a href="app-email.html"  class="nav-link icon app_inbox"><i class="fa fa-envelope"></i></a> --}}
                {{-- <a href="app-filemanager.html"  class="nav-link icon app_file xs-hide"><i class="fa fa-folder"></i></a> --}}
            </div>
        </div>
        <div class="hright">
            <div class="dropdown">
                <a href="javascript:cargar_notificaciones()" class="nav-link icon settingbar"><i class="fa fa-bell"></i></a>
                <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa fa-navicon"></i><span class="badge badge-danger badge-pill m-0" id="num_notifiacaiones"></span></a>
            </div>
        </div>
    </div>
</div>

