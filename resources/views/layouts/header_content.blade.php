<div class="page">

    <!-- start body header -->
    <div id="page_top" class="section-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="left">
                    <h1 class="page-title">@yield('title_content')</h1>
                </div>
                <div class="right">
                    <div class="notification d-flex">
                        <a class="btn btn-facebook" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-2 font-size-16 align-middle mr-1"></i> Salir</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')
    
</div>