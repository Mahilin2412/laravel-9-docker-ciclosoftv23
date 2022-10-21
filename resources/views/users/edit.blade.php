@extends('layouts.admin.app')

@section('content')
    <form action="{{ route('users.update',$users->IdUser) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="title text-lg-center">Actalización de Usuarios</h1>
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
                                    <input type="text" class="form-control" value="{{ $users->FirstName }}" name="FirstName" id="formrow-firstname-input" autocomplete="off" required maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-secondname-input" class="form-label">Segundo Nombre</label>
                                    <input type="text" class="form-control" value="{{ $users->SecondName }}" name="SecondName" id="formrow-secondname-input" autocomplete="off" maxlength="20">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstlastname-input" class="form-label">Primer apellido *</label>
                                    <input type="text" class="form-control" value="{{ $users->FirstLastName }}" name="FirstLastName" id="formrow-firstlastname-input" autocomplete="off" required maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-secondlastname-input" class="form-label">Segundo apellido</label>
                                    <input type="text" class="form-control" value="{{ $users->SecondLastName }}" name="SecondLastName" id="formrow-secondlastname-input" autocomplete="off" maxlength="20">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <!-- end col -->
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Más datos</h4>
                        <div class="row">
                            <div class="mb-3">
                                <label for="formrow-inputRol" class="form-label">Rol Usuario *</label>
                                <select id="formrow-inputRol" name="RolUser" class="form-select" required>
                                    <option selected="" disabled>Seleccionar...</option>
                                    <option @if ($users->RolUser == 'A') selected @endif value="A">Administrador</option>
                                    <option @if ($users->RolUser == 'F') selected @endif value="F">Final</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="formrow-inputEstatus" class="form-label">Estado *</label>
                                <select id="formrow-inputEstatus" name="StatusUser" class="form-select" required>
                                    <option selected="" disabled>Seleccionar...</option>
                                    <option @if ($users->StatusUser == 1) selected @endif value="1">Activo</option>
                                    <option @if ($users->StatusUser == 0) selected @endif value="0">Incativo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Datos de sesión</h5>

                        <div class="row gy-2 gx-3 align-items-center">
                            <div class="col-sm-auto">
                                <label class="visually-hidden" for="autoSizingInput">Correo *</label>
                                <input type="email" value="{{ $users->email }}" class="form-control" id="autoSizingInput" name="email" placeholder="Correo" autocomplete="off" required>
                            </div>
                            <div class="col-sm-auto">
                                <label class="visually-hidden" for="autoSizingInputGroup1">Contraseña *</label>
                                <div class="input-group">
                                    <input type="password" readonly class="form-control" id="autoSizingInputGroup1" name="password1" placeholder="Contraeña" required>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <label class="visually-hidden" for="autoSizingInputGroup2">Confirmar contraseña *</label>
                                <div class="input-group">
                                    <input type="password" readonly class="form-control" id="autoSizingInputGroup2" name="PasswordConfim" placeholder="Confirmar contraseña" required>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <button type="submit" class="btn btn-primary w-md">Actualizar usuario</button>
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
