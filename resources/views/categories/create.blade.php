@extends('layouts.admin.app')

@section('content')
    <form action="{{ route('categories.index') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="title text-lg-center">Gestion de Categorias</h1>
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
                                <label class="visually-hidden" for="reference">Referencia *</label>
                                <input type="text" class="form-control" id="reference" name="ReferenceType" placeholder="referencia" autocomplete="off" MAXLENGTH="15" required>
                            </div>
                            <div class="col-sm-auto">
                                <label class="visually-hidden" for="name">Nombre *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="NameCategory" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <label class="visually-hidden" for="user">Usuario *</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="user" name="FKIdUser" value="{{ \Illuminate\Support\Facades\Auth::user()->IdUser }}" placeholder="Usuario" required hidden>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <button type="submit" class="btn btn-primary w-md">Guardar</button>
                            </div>
                            <div class="col-sm-auto">
                                <a class="btn btn-warning form-control" href="{{ route('categories.index') }}">Cancelar</a>
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
