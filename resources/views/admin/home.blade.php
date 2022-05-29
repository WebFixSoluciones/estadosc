@extends('layouts.app')

@section('contenido')
    <h4 class="tx-gray-800 mg-b-5">Bienvenido {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</h4>
    <p class="mg-b-0">Este es tu panel administrador.</p>
@endsection
