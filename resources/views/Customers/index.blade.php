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
                            <a href="{{ route('customers.create') }}" class="btn btn-primary">Crear nuevo Cliente</a>
                            <div class="table-responsive mt-5">
                                <table id="fichas" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>No. Documento</th>
                                        <th>Tipo de Documento</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo Electrónico</th>
                                        <th>Dirección</th>
                                        <th>Número de telefonico</th>
                                       <!-- <th>Estado del cliente</th>-->
                                        <th>Usuario</th>
                                        <th>Fecha creación</th>
                                        <th>Fecha modificación</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $data)
                                        <tr>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('customers.show',$data->IdCustomer) }}">{{ $loop->iteration }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('providers.show',$data->IdCustomer) }}">{{ $data->third->NumIdentification }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('providers.show',$data->IdCustomer) }}">{{ $data->third->tdocu->AcroTypeDoc }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('customers.show',$data->IdCustomer) }}">{{ $data->FirstNameCustomer }} {{ $data->SecondNameCustomer }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('customers.show',$data->IdCustomer) }}">{{ $data->LastNameCustomer }} {{ $data->SecondLastNameCustomer }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('customers.show',$data->IdCustomer) }}">{{ $data->mail }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('customers.show',$data->IdCustomer) }}">{{ $data->Address }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('customers.show',$data->IdCustomer) }}">{{ $data->NumberPhone }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('customers.show',$data->IdCustomer) }}">{{ $data->users->FirstName }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('customers.show',$data->IdCustomer) }}">{{ $data->created_at }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('customers.show',$data->IdCustomer) }}">{{ $data->updated_at }}</a></td>
                                            <td>
                                                <a href="{{ route('customers.edit',$data->IdCustomer) }}" class="btn btn-sm btn-warning">Editar</a>
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
