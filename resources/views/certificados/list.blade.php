@extends('layouts.app')

@section('contenido')
    <h4 class="tx-gray-800 mg-b-5">Listado de Certificados</h4>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block mt-20" style="margin-top: 20px">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> {{ $message }} </strong>
                </div>
            @endif
            <div class="table-wrapper">
                <table id="datatable1" style="width: 100%" class="table display responsive nowrap">
                    <thead>
                        <tr width="100%">
                            <th width="">Id</th>
                            <th width="">DNI</th>
                            <th width="">Usuario</th>
                            <th width="">Certificado</th>
                            <th width="">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certificados as $certificado)
                            <tr>
                                <td>{{ $certificado->id }}</td>
                                <td>{{ $certificado->usuario->dni }}</td>
                                <td>{{ $certificado->usuario->nombre }}</td>
                                <td>{{ $certificado->curso->curso }}</td>
                                <td>
                                    <a href="{{route('getPdf', $certificado->id)}}">
                                        <i class="fa fa-file text-success"></i></a>
                                    <a href="{{ route('deleteCertificado', $certificado->id) }}"><i
                                            class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div>
    </div>




    <!-- BASIC MODAL -->
    <div id="modaldemo1" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">AGREGAR CATEGORIA</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <form action="{{ route('saveCategoria') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Categoria</label>
                            <input type="text" class="form-control" name="categoria">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Guardar
                        Cambios</button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        data-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <div id="modal2" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">AGREGAR CATEGORIA</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <form action="{{ route('updateCategoria') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria">
                            <input type="hidden" class="form-control" id="idCategoria" name="idCategoria">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Guardar
                        Cambios</button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        data-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection


@section('scripts')
    <script>
        function editarCategoria(idCategoria) {
            axios.get('/api/categoria/' + idCategoria).then((response) => {
                $("#categoria").val(response.data.categoria.categoria)
                $("#idCategoria").val(response.data.categoria.id)
                $("#modal2").modal('show')
            })
        }

        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Buscar',
                sSearch: '',
                lengthMenu: '_MENU_ Reistro por Pagina',
                paginate: {
                    first: "Primera",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Ultima"
                },
                info: "Mostrando _START_ de _END_ en _TOTAL_ registros",
            }
        });
    </script>
@endsection
