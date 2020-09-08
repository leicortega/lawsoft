@extends('layouts.app')

@section('title_content') Dashboard @endsection

@section('content')

<div class="section-body">
    <div class="container-fluid">
        <h4>Bienvenido {{ \Auth::user()->name }}</h4>
    </div>
</div>
    
@endsection