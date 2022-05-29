@extends('layouts.app')

@section('contenido')
        <h4 class="tx-gray-800 mg-b-5">Cargar Cursos</h4>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block mt-20" style="margin-top: 20px">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> {{ $message }} </strong>
                </div>
            @endif
                <form action="{{route('cargaCursos_post')}}" method="POST" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
            <div class="form-group">
                <label for="">Cargar Archivo</label>
                <input type="file" name="cursos" class="form-control">
            </div>

            <input type="submit" value="Cargar" class="form-control btn btn-success">
            </form>
        </div>
    </div>

@endsection
