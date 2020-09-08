<div class="user_div">
    <h5 class="brand-name mb-4"><a href="javascript:void(0)" class="user_btn"><i class="icon-close"></i></a></h5>
    <div class="card">
        {{-- <img class="card-img-top" src="{{ asset('assets/images/gallery/6.jpg') }}" alt="Card image cap"> --}}
        <div class="card-body">
            <h5 class="card-title my-3">{{ auth()->user()->name }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ auth()->user()->identificacion }}</li>
            <li class="list-group-item">{{ auth()->user()->email }}</li>
            <li class="list-group-item">{{ auth()->user()->estado }}</li>
            <li class="list-group-item">{{ auth()->user()->getRoleNames()[0] }}</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Premisos</h5>
        </div>
        <ul class="list-group list-group-flush">
            @foreach (auth()->user()->getAllPermissions() as $item)
                <li class="list-group-item">{{ $item->name }}</li>
            @endforeach
        </ul>
    </div>
    {{-- <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label class="d-block">Total Income<span class="float-right">77%</span></label>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="d-block">Total Expenses <span class="float-right">50%</span></label>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                </div>
            </div>
            <div class="form-group mb-0">
                <label class="d-block">Gross Profit <span class="float-right">23%</span></label>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="form-group mt-5">
        {{-- <label class="d-block">Storage <span class="float-right">77%</span></label>
        <div class="progress progress-sm">
            <div class="progress-bar" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
        </div> --}}
        <button type="button" class="btn btn-primary btn-block mt-3" onclick="void(0)">Cambiar Contraseña</button>
        <button type="button" class="btn btn-primary btn-block mt-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesion</button>
    </div>
</div>