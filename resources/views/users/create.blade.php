@extends('layouts.admin.app')

@section('content')
    <form action="{{ route('users.index') }}" method="POST">
        @csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="title text-lg-center">Gestion de usuarios nuevos</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Datos Basicos</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Primer Nombre *</label>
                                    <input type="text" class="form-control" name="FirstName" id="formrow-firstname-input" autocomplete="off" required maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-secondname-input" class="form-label">Segundo Nombre</label>
                                    <input type="text" class="form-control" name="SecondName" id="formrow-secondname-input" autocomplete="off" maxlength="20">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstlastname-input" class="form-label">Primer apellido *</label>
                                    <input type="text" class="form-control" name="FirstLastName" id="formrow-firstlastname-input" autocomplete="off" required maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-secondlastname-input" class="form-label">Segundo apellido</label>
                                    <input type="text" class="form-control" name="SecondLastName" id="formrow-secondlastname-input" autocomplete="off" maxlength="20">
                                </div>
                            </div>
                        </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Datos de sesión</h4>
                    <div class="row">
                        <div class="mb-3">
                            <label for="formrow-inputEstatus" class="form-label">Estado *</label>
                            <select id="formrow-inputEstatus" name="StatusUser" class="form-select" required>
                                <option selected="" disabled>Seleccionar...</option>
                                <option value="1">Activo</option>
                                <option value="0">Incativo</option>
                            </select>
                        </div>
                        <div class="row gy-2 gx-3 align-items-center">
                            <div class="col-sm-auto">
                                <label class="visually-hidden" for="autoSizingInput">Correo *</label>
                                <input type="email" class="form-control" id="autoSizingInput" name="email" placeholder="Correo" autocomplete="off" required>
                            </div>
                            <div class="col-sm-auto">
                                <label class="visually-hidden" for="autoSizingInputGroup1">Contraseña *</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="autoSizingInputGroup1" name="password" placeholder="Contraeña" required>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <label class="visually-hidden" for="autoSizingInputGroup2">Confirmar contraseña *</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="autoSizingInputGroup2" name="PasswordConfim" placeholder="Confirmar contraseña" required>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <button type="submit" class="btn btn-primary w-md">Guardar usuario</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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
