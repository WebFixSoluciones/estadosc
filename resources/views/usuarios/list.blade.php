@extends('layouts.app')

@section('contenido')
    <h4 class="tx-gray-800 mg-b-5">Listado de Usuarios</h4>
    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modaldemo1"> <i
            class="fa fa-plus-circle"></i> Agregar Usuario</button>
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
                            <th width="33%">Nombre</th>
                            <th width="33%">DNI</th>
                            <th width="33%">Tipo Usuario</th>
                            <th width="33%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                                <td>{{ $usuario->dni }}</td>
                                <td>
                                    @if ($usuario->rol_id == 1)
                                        <span class="badge badge-success">ADMINISTRADOR</span>
                                    @else
                                        <span class="badge badge-primary">USUARIO</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" onclick="editarUsuario({{ $usuario->id }})"><i
                                            class="fa fa-edit text-primary"></i></a>
                                    <a href="{{ route('deleteUsuario', $usuario->id) }}"><i
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
    <div id="modaldemo2" class="modal fade">
        <div class="modal-dialog modal-lg" style="width: 60% !important" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">AGREGAR USUARIO</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <form action="{{ route('updateUsuario') }}" method="POST" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Cedula</label>
                            <input type="text" name="dni" id="dni" class="form-control">
                            <input type="hidden" name="idUsuario" id="idUsuario" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Correo</label>
                            <input type="text" name="correo" id="correo" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Clave</label>
                            <input type="text" name="clave" id="clave" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Sexo</label>
                            <select name="sexo" class="form-control" id="sexo" id="">
                                <option value="">SELECCIONE</option>
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Rol Id</label>
                            <select name="rol_id" class="form-control" id="rol_id" id="">
                                <option value="">SELECCIONE</option>
                                <option value="1">ADMINISTRADOR</option>
                                <option value="2">USUARIO</option>
                            </select>
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
    <div id="modaldemo1" class="modal fade">
        <div class="modal-dialog modal-lg" style="width: 60% !important" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">EDITAR USUARIO</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <form action="{{ route('saveUsuario') }}" method="POST" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Cedula</label>
                            <input type="text" name="dni" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Apellido</label>
                            <input type="text" name="apellido" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Correo</label>
                            <input type="text" name="correo" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Usuario</label>
                            <input type="text" name="usuario" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Clave</label>
                            <input type="text" name="clave" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Sexo</label>
                            <select name="sexo" class="form-control" id="">
                                <option value="">SELECCIONE</option>
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Rol Id</label>
                            <select name="rol_id" class="form-control" id="">
                                <option value="">SELECCIONE</option>
                                <option value="1">ADMINISTRADOR</option>
                                <option value="2">USUARIO</option>
                            </select>
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
        function editarUsuario(idUsuario) {
            axios.get('/api/usuario/' + idUsuario).then((response) => {
                $("#idUsuario").val(response.data.usuario.id)
                $("#dni").val(response.data.usuario.dni)
                $("#nombre").val(response.data.usuario.nombre)
                $("#apellido").val(response.data.usuario.apellido)
                $("#telefono").val(response.data.usuario.telefono)
                $("#correo").val(response.data.usuario.correo)
                $("#usuario").val(response.data.usuario.usuario)
                $("#rol_id option[value="+response.data.usuario.rol_id+"]").attr("selected",true)
                $("#sexo option[value="+response.data.usuario.sexo+"]").attr("selected",true)
                $("#modaldemo2").modal('show')
            })
        }

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
