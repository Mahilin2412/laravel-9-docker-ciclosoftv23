@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="col-12">
            @if(session('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">
                    <i class="mdi mdi-{{ session('icon') }} me-2"></i>
                    {{ session('response') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Crear nuevo usuario</a>
                            <div class="table-responsive mt-5">
                                <table id="fichas" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                        <th>Fecha creación</th>
                                        <th>Fecha modificación</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $data)
                                        <tr>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('users.show',$data->IdUser) }}">{{ $loop->iteration }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('users.show',$data->IdUser) }}">{{ $data->FirstName }} {{ $data->SecondName }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('users.show',$data->IdUser) }}">{{ $data->FirstLastName }} {{ $data->SecondLastName }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('users.show',$data->IdUser) }}">{{ $data->email }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('users.show',$data->IdUser) }}"> @if($data->StatusUser = 0) Inactivo @else Activo @endif</td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('users.show',$data->IdUser) }}">{{ $data->created_at }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('users.show',$data->IdUser) }}">{{ $data->updated_at }}</a></td>
                                            <td>
                                                <a href="{{ route('users.edit',$data->IdUser) }}" class="btn btn-sm btn-warning">Editar</a>
                                                <a href="{{ route('roleasign.edit',$data)}}" class="btn btn-sm btn-primary">Roles</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap.min.js"></script>
    <script>
        function validatorpass(){

        }
    </script>
    <script>
        $(document).ready(function() {
            $('#fichas').DataTable(
                {
                    responsive: true,
                    autoWidth: false,

                    "language": {
                        "lengthMenu": "Mostrar " +
                            `<select class="custom-select custom-select-sm form-control form-control-sm">
                                 <option selected value = '5'>5</option>
                                 <option value = '25'>25</option>
                                 <option value = '50'>50</option>
                                 <option value = '100'>100</option>
                                 <option value = '-1'>Todo</option>
                                 </select>` +
                            " registros por página",
                        "zeroRecords": "Dato no encontrado",
                        "info": "Mostrando la página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate": {
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                }
            );
        } );
    </script>

@endsection
