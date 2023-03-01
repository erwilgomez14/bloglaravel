@extends('theme.back.app')

@section('titulo')
    Menu
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('assests/back/extra-libs/nestable/jquery.nestable.css')}}" type="text">
@endsection

@section('scriptsPlugins')
<script src="{{asset('assets/back/extra-libs/nestable/jquery.nestable.js')}}" type="text/javascripts"></script>    
@endsection
@section('scripts')
<script src="{{asset('assets/back/js/pages/scripts/menu/index.js')}}" type="text/javascripts"></script>       
@endsection

@section('contenido')
    
@endsection