@extends('layouts.admin.app')

@section('content')
    <form action="{{ route('warehouses.index') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="title text-lg-center">Gestion de Bodegas</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Datos de basicos</h5>

                        <div class="row gy-2 gx-3 align-items-center">
                            <div class="col-sm-auto">
                                <label class="form-label" for="reference">Referencia *</label>
                                <input type="text" class="form-control" id="reference" name="ReferenceWareHouse" placeholder="referencia" autocomplete="off" MAXLENGTH="10" required>
                            </div>
                            <div class="col-sm-auto">
                                <label class="form-label" for="Name">Nombre *</label>
                                <input type="text" class="form-control" id="Name" name="Name" placeholder="Nombre bodega" autocomplete="off" MAXLENGTH="50" required>
                            </div>
                            <div class="col-sm-auto">
                                <label for="formrow-inputEstatus" class="form-label">Estado *</label>
                                <select id="formrow-inputEstatus" name="StatusWareHouse" class="form-select" required>
                                    <option selected="" disabled>Seleccionar...</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Incativo</option>
                                </select>
                            </div>
                            <div class="col-sm-auto">
                                <label for="formrow-inputFKIdUserMan" class="form-label">Jefe Bodega *</label>
                                <select id="formrow-inputFKIdUserMan" name="FKIdUserMan" class="form-select" required>
                                    <option selected="" disabled>Seleccionar...</option>
                                    @foreach($users as $data)
                                        <option value="{{$data->IdUser}}">{{$data->FirstName}} | {{ $data->SecondName }}</option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control" id="user" name="FKIdUser" value="121212" placeholder="Usuario" required hidden>
                            </div>
                            <div class="col-sm-auto">
                                <button type="submit" class="btn btn-primary w-md">Guardar</button>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
