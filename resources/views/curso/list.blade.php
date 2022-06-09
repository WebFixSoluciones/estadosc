@extends('layouts.app')

@section('contenido')
    <h4 class="tx-gray-800 mg-b-5">Listado de Cursos</h4>
    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modaldemo1"> <i
            class="fa fa-plus-circle"></i> Agregar Curso</button>
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
                            <th width="33%">Id</th>
                            <th width="33%">Curso</th>
                            <th width="33%">Certificados</th>
                            <th width="33%">Convocatoria</th>
                            <th width="33%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id }}</td>
                                <td>{{ $curso->curso }}</td>
                                <td class="text-center">{{ $curso->certificados_count }}</td>
                                <td>{{ $curso->convocatoria }}</td>
                                <td>
                                    <a href="#" onclick="editarCurso({{ $curso->id }})"><i
                                            class="fa fa-edit text-primary"></i></a>
                                    <a href="#" onclick="eliminar({{ $curso->certificados_count }}, {{ $curso->id }}, '{{$ruta}}')"><i
                                            class="fa fa-trash text-danger"></i></a>
                                    <i class="fa fa-image text-warning" onclick="cargarImagen({{ $curso->id }})"></i>
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
        <div class="modal-dialog modal-lg" style="width: 60% !important" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">AGREGAR CURSO</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <form action="{{ route('saveCurso') }}" method="POST" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Categoria</label>
                            <select name="idCategoria" required class="form-control" id="">
                                <option value="">SELECCIONE</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Curso</label>
                            <input type="text" name="curso" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea name="descripcion" id="" class="form-control" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Fecha Fin</label>
                            <input type="date" name="fecha_fin" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Convocatoria</label>
                            <input type="text" name="convocatoria" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Imagen</label>
                            <input type="file" name="imagen" class="form-control">
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



    <!-- BASIC MODAL -->
    <div id="modaldemo2" class="modal fade">
        <div class="modal-dialog modal-lg" style="width: 60% !important" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">EDITAR CURSO</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <form action="{{ route('updateCurso') }}" method="POST" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Categoria</label>
                            <select name="idCategoria" required class="form-control" id="categoria">
                                <option value="">SELECCIONE</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Curso</label>
                            <input type="text" name="curso" id="curso" class="form-control">
                            <input type="hidden" name="idCurso" id="idCurso" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Fecha Fin</label>
                            <input type="date" name="fecha_fin" id="fecha_final" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Convocatoria</label>
                            <input type="text" name="convocatoria" id="convocatoria" class="form-control">
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



    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" style="width: 60% !important" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">CARGAR IMAGEN DEL CURSO</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <form action="{{ route('updateImagenCurso') }}" method="POST" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Imagen</label>
                            <input type="file" name="imagen" class="form-control">
                            <input type="hidden" name="idCurso" id="idCursoImagen">
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

        function editarCurso(idCurso) {
            axios.get('/api/curso/' + idCurso).then((response) => {
                $("#curso").val(response.data.curso.curso)
                $("#descripcion").val(response.data.curso.descripcion)
                console.log(response.data.curso.idCategoria)
                $("#categoria option[value=" + response.data.curso.idCategoria + "]").attr("selected", true)
                $("#fecha_inicio").val(response.data.curso.fecha_inicio)
                $("#fecha_final").val(response.data.curso.fecha_final)
                $("#convocatoria").val(response.data.curso.convocatoria)
                $("#idCurso").val(response.data.curso.id)
                $("#modaldemo2").modal('show')
            })
        }

        function cargarImagen(idCurso) {
            $("#modaldemo3").modal('show')
            $("#idCursoImagen").val(idCurso)
        }

        function eliminar(count, idCurso, ruta) {
            Swal.fire({
                title: 'Deseas realmente eliminar, el curso? este contiene un total de '+count+' certificados, si lo eliminas, eliminas con el sus certificados.',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                denyButtonText: `No Eliminar`,
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = ruta+"/"+idCurso;
                } else if (result.isDenied) {

                }
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
