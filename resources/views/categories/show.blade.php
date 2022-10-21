@extends('layouts.admin.app')

@section('content')
    <form action="{{ route('categories.update', $category->IdTypeProduct) }}" method="POST">
        @csrf
        @method('PUT')
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
                                <input type="text" disabled class="form-control" id="reference" value="{{ $category->ReferenceType }}" name="ReferenceType" placeholder="referencia" autocomplete="off" MAXLENGTH="15" required>
                            </div>
                            <div class="col-sm-auto">
                                <label class="visually-hidden" for="name">Nombre *</label>
                                <div class="input-group">
                                    <input type="text" disabled class="form-control" id="name" value="{{ $category->NameCategory }}" name="NameCategory" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <a class="btn btn-warning form-control" href="{{ route('categories.index') }}">Volver</a>
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
