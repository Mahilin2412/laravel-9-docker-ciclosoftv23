@extends('layouts.admin.app')

@section('content')
    <form>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="title text-lg-center">Gestion de productos nuevos</h1>
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
                                    <label for="formrow-NameProduct-input" class="form-label">Nombre producto *</label>
                                    <input type="text" disabled="" value="{{ $product->NameProduct }}" class="form-control" name="NameProduct" id="formrow-NameProduct-input" autocomplete="off" required maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-Reference-input" class="form-label">Referencia *</label>
                                    <input type="text" disabled="" value="{{ $product->Reference }}" class="form-control" name="Reference" id="formrow-Reference-input" autocomplete="off" maxlength="15" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-inputEstatus" class="form-label">Estado *</label>
                                    <select id="formrow-inputEstatus" disabled="" name="StatusProduct" class="form-select" required>
                                        <option selected="" disabled>Seleccionar...</option>
                                        <option @if ($product->StatusProduct == 1) selected @endif value="1">Activo</option>
                                        <option @if ($product->StatusProduct == 0) selected @endif value="0">Incativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-inputFKIdTypeProduct" class="form-label">Categoria *</label>
                                    <select id="formrow-inputFKIdTypeProduct" disabled="" name="FKIdTypeProduct" class="form-select" required>
                                        <option selected="" disabled>Seleccionar...</option>
                                        @foreach($categories as $data)
                                            <option @if ($product->FKIdTypeProduct == $data->IdTypeProduct) selected @endif value="{{$data->IdTypeProduct}}">{{$data->ReferenceType}} | {{ $data->NameCategory }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Mas datos</h4>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-check-input" disabled name="ManIva" value="1" type="checkbox"  id="gridCheck1" @if($product->ManIva == 1) checked @endif onclick="checkiva({{ $product->PorIva }})">
                                    <label class="form-check-label" for="gridCheck1">
                                        Maneja IVA
                                    </label>
                                </div>
                                <div class="col-6">
                                    <!--<label for="formrow-PorIva-input" class="form-label">% de IVA *</label>-->
                                    <input type="number" class="form-control" disabled name="PorIva" id="formrow-PorIva-input" value="{{ $product->PorIva }}" autocomplete="off" required max="100" min="0" placeholder="% iva">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-PorDesc-input" class="form-label">% Descuento *</label>
                            <input type="number" disabled class="form-control" name="PorDesc" id="formrow-PorDesc-input" autocomplete="off" required max="100" min="0" value="{{ $product->PorDesc }}">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-Price-input" class="form-label">Precio *</label>
                            <input type="number" disabled="" value="{{ $product->Price }}" class="form-control" name="Price" id="formrow-Price-input" autocomplete="off" required maxlength="50">
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Foto Producto</h4>
                        <div class="row">
                            <div class="mb-3">
                                <img id="img1" height="200" src="{{ $product->imageProduct }}">
                                <!--<input id="inputFile1" name="imageProduct" type="file" class="form-control">-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Descripción</h4>
                        <div class="row">
                            <div class="col-md-8">
                                <textarea name="Description" disabled class="form-control">{{ $product->Description }}</textarea>
                                <input type="number" class="form-control" id="user" name="FKIdUser" value="121212" placeholder="Usuario" required hidden>
                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-warning form-control" href="{{ route('products.index') }}">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- end col -->
        </div>
    </form>
@endsection
