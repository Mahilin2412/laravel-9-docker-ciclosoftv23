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
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Crear nuevo producto</a>
                            <div class="table-responsive mt-5">
                                <table id="products" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Referencia</th>
                                        <th>Maneja IVA</th>
                                        <th>% IVA</th>
                                        <th>% Descuento</th>
                                        <th>Precio</th>
                                        <th>Estado</th>
                                        <th>Descripción</th>
                                        <th>Imagen</th>
                                        <th>Categoria</th>
                                        <th>Usuario</th>
                                        <th>Fecha creación</th>
                                        <th>Fecha modificación</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $data)
                                        <tr>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">{{ $loop->iteration }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">{{ $data->NameProduct }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">{{ $data->Reference }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}"> @if($data->ManIva == 0) NO @else SI @endif</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">{{ $data->PorIva }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">{{ $data->PorDesc }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">${{ $data->Price }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}"> @if($data->StatusProduct == 0) Inactivo @else Activo @endif</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">{{ $data->Description }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}"> @if($data->imageProduct) <img src="{{ $data->imageProduct }}" height="100" width="50" class="img-fluid mx-auto d-block"> @else No registrada @endif </a> </td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">{{ $data->categories->ReferenceType }} - {{ $data->categories->NameCategory }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">{{ $data->users->FirstName }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">{{ $data->created_at }}</a></td>
                                            <td><a class="text-decoration-none text-dark" href="{{ route('products.show',$data->IdProduct) }}">{{ $data->updated_at }}</a></td>
                                            <td>
                                                <a href="{{ route('products.edit',$data->IdProduct) }}" class="btn btn-sm btn-warning">Editar</a>
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
            $('#products').DataTable(
                {
                    responsive: true,
                    autoWidth: false,

                    "language": {
                        "lengthMenu": "Mostrar " +
                            `<select class="custom-select custom-select-sm form-control form-control-sm">
                                 <option selected="" value = '5'>5</option>
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
