@extends('layouts.admin.app')

@section('content')
    <form action="{{ route('providers.index') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                @if(session('status'))
                    <div class="alert alert-{{ session('status') }}" role="alert">
                        <i class="mdi mdi-{{ session('icon') }} me-2"></i>
                        {{ session('response') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h1 class="title text-lg-center">Gestion de Proveedores</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Datos basicos</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="FKIdTypeDoc-input" class="form-label">Tipo de documento *</label>
                                        <select id="FKIdTypeDoc-input" class="form-select" name="FKIdTypeDoc" required>
                                            <option selected="" disabled>Seleccionar...</option>
                                            @foreach($documenttypes as $data)
                                                <option value="{{$data->IdTypeDoc}}">{{$data->NameTypeDoc}} | {{ $data->AcroTypeDoc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="NumIdentification-input" class="form-label">Documento *</label>
                                        <input class="form-control" type="text" name="NumIdentification" id="NumIdentification" maxlength="30" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label">Primer Nombre *</label>
                                        <input type="text" class="form-control" id="formrow-email-input" name="FirstNameProvider" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-password-input" class="form-label">Segundo Nombre</label>
                                        <input type="text" class="form-control" id="formrow-password-input" name="SecondNameProvider" maxlength="20">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label">Primer Apellido *</label>
                                        <input type="text" class="form-control" id="formrow-email-input" name="FirstLastNameProvider" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-password-input" class="form-label">Segundo Apellido</label>
                                        <input type="text" class="form-control" id="formrow-password-input" name="SecondLastNameProvider"  maxlength="20">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="formrow-password-input" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control" id="formrow-password-input" name="NameComplete" placeholder="Nombre de la emrpesa si se registra con NIT" maxlength="90">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Guardar</button>
                                <a class="btn btn-warning w-md" href="{{ route('providers.index') }}">Cancelar</a>
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
                        <h4 class="card-title mb-4">Más Información</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="formrow-inputEstatus" class="form-label">Estado *</label>
                                    <select id="formrow-inputEstatus" name="StatusProvider" class="form-select" required>
                                        <option selected="" disabled>Seleccionar...</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="formrow-inputEstatus" class="form-label">Genero *</label>
                                    <select id="formrow-inputEstatus" name="FKIdGender" class="form-select" required>
                                        <option selected="" disabled>Seleccionar...</option>
                                        @foreach($genders as $data)
                                            <option value="{{$data->IdGender}}">{{$data->Name}} </option>
                                        @endforeach
                                    </select>
                                    <input type="number" class="form-control" id="user" name="FKIdUser" value="{{ \Illuminate\Support\Facades\Auth::user()->IdUser }}" placeholder="Usuario" required hidden>
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
