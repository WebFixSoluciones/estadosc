@extends('layouts.app')

@section('contenido')
    <h4 class="tx-gray-800 mg-b-5">Bienvenido {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</h4>
    {{-- <p class="mg-b-0">Este es tu panel administrador.</p> --}}

    <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-person-stalker tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Usuarios</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$usuarios}}</p>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-danger rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Cursos</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$cursos}}</p>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-primary rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-paper-airplane tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-8 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Certificados</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{$certificados}}</p>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->

        </div>
@endsection
