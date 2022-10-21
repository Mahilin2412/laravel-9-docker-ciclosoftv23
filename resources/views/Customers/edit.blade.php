@extends('layouts.admin.app')

@section('content')
    <form action="{{ route('customers.update',$customer->IdCustomer) }}" method="POST">
        @csrf
        @method('PUT')
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
                        <h1 class="title text-lg-center">Gestion de Clientes</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Datos básicos</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="FKIdTypeDoc-input" class="form-label">Tipo de documento *</label>
                                    <select id="FKIdTypeDoc-input" class="form-select" name="FKIdTypeDoc" required>
                                        <option selected="" disabled>Seleccionar...</option>
                                        @foreach($documenttypes as $data)
                                            <option @if ($customer->third->FKIdTypeDoc == $data->IdTypeDoc) selected @endif value="{{$data->IdTypeDoc}}">{{$data->NameTypeDoc}} | {{ $data->AcroTypeDoc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="NumIdentification-input" class="form-label">Documento *</label>
                                    <input class="form-control" type="text" value="{{ $customer->third->NumIdentification }}" name="NumIdentification" id="NumIdentification" maxlength="30" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Primer Nombre *</label>
                                    <input type="text" class="form-control" id="formrow-email-input" value="{{ $customer->FirstNameCustomer }}" name="FirstNameCustomer" maxlength="20" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Segundo Nombre</label>
                                    <input type="text" class="form-control" id="formrow-password-input" value="{{ $customer->SecondNameCustomer }}" name="SecondNameCustomer" maxlength="20">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Primer Apellido *</label>
                                    <input type="text" class="form-control" id="formrow-email-input" value="{{ $customer->LastNameCustomer }}" name="LastNameCustomer" maxlength="20" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="formrow-password-input" value="{{ $customer->SecondLastNameCustomer }}" name="SecondLastNameCustomer"  maxlength="20">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" id="formrow-password-input" value="{{ $customer->third->NameComplete }}" name="NameComplete" placeholder="Nombre de la emrpesa si se registra con NIT" maxlength="90">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Guardar</button>
                            <a class="btn btn-warning w-md" href="{{ route('customers.index') }}">Cancelar</a>
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
                            <!--<div class="col-md-4">
                                <div class="mb-4">
                                    <label for="formrow-inputEstatus" class="form-label">Estado *</label>
                                    <select id="formrow-inputEstatus" name="StatusProvider" class="form-select" required>
                                        <option selected="" disabled>Seleccionar...</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>-->
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="formrow-inputEstatus" class="form-label">Genero *</label>
                                    <select id="formrow-inputEstatus" name="FKIdGender" class="form-select" required>
                                        <option selected="" disabled>Seleccionar...</option>
                                        @foreach($genders as $data)
                                            <option @if ($customer->third->FKIdGender == $data->IdGender) selected @endif value="{{$data->IdGender}}">{{$data->Name}} </option>
                                        @endforeach
                                    </select>
                                    <input type="number" class="form-control" id="user" name="FKIdUser" value="{{ \Illuminate\Support\Facades\Auth::user()->IdUser }}" placeholder="Usuario" required hidden>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="formrow-inputEstatus" class="form-label">Contraseña *</label>
                                    <input type="password" class="form-control" id="formrow-password-input" value="{{ $customer->password }}" name="password"  maxlength="20" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="formrow-inputEstatus" class="form-label">Correo Electrónico *</label>
                                    <input type="text" class="form-control" id="formrow-password-input" name="mail" value="{{ $customer->mail }}" maxlength="20" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="formrow-inputEstatus" class="form-label">Direccion de residencia *</label>
                                    <input type="text" class="form-control" id="formrow-password-input" name="Address" value="{{ $customer->Address }}" maxlength="20" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="formrow-inputEstatus" class="form-label">Direccion de entrega *</label>
                                    <input type="text" class="form-control" id="formrow-password-input" name="AddressEntry" value="{{ $customer->AddressEntry }}" maxlength="20" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="formrow-inputEstatus" class="form-label">Número celular *</label>
                                    <input type="text" class="form-control" id="formrow-password-input" name="NumberPhone" value="{{ $customer->NumberPhone }}" maxlength="20" required>
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
