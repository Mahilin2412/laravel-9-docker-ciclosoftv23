@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Detalle Producto</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <button type="button" class="btn btn-outline-dark waves-effect waves-light"><a href="{{ route('stores.index') }}">Regresar a Comercio</a></button>
                        <!--<li class="breadcrumb-item active">Product Detail</li>-->
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="product-detai-imgs">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-4">
                                        <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true">
                                                <img src="{{ $product->imageProduct }}" alt="" class="img-fluid mx-auto d-block rounded">
                                            </a>
                                            <a class="nav-link" id="product-2-tab" data-bs-toggle="pill" href="#product-2" role="tab" aria-controls="product-2" aria-selected="false">
                                                <img src="{{ $product->imageProduct }}" alt="" class="img-fluid mx-auto d-block rounded">
                                            </a>
                                            <a class="nav-link" id="product-3-tab" data-bs-toggle="pill" href="#product-3" role="tab" aria-controls="product-3" aria-selected="false">
                                                <img src="{{ $product->imageProduct }}" alt="" class="img-fluid mx-auto d-block rounded">
                                            </a>
                                            <a class="nav-link" id="product-4-tab" data-bs-toggle="pill" href="#product-4" role="tab" aria-controls="product-4" aria-selected="false">
                                                <img src="{{ $product->imageProduct }}" alt="" class="img-fluid mx-auto d-block rounded">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                <div>
                                                    <img src="{{ $product->imageProduct }}" alt="" class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-2" role="tabpanel" aria-labelledby="product-2-tab">
                                                <div>
                                                    <img src="{{ $product->imageProduct }}" alt="" class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-3" role="tabpanel" aria-labelledby="product-3-tab">
                                                <div>
                                                    <img src="{{ $product->imageProduct }}" alt="" class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product-4" role="tabpanel" aria-labelledby="product-4-tab">
                                                <div>
                                                    <img src="{{ $product->imageProduct }}" alt="" class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                <i class="bx bx-cart me-2"></i> Añadir producto
                                            </button>
                                            <button type="button" class="btn btn-success waves-effect  mt-2 waves-light">
                                                <i class="bx bx-shopping-bag me-2"></i>Comprar
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mt-4 mt-xl-3">
                                <a href="javascript: void(0);" class="text-primary">{{ $product->NameProduct }}</a>
                                <h4 class="mt-1 mb-3">{{ $product->NameProduct }} {{ $product->Reference }}</h4>

                                <p class="text-muted float-start me-3">
                                    <span class="bx bxs-star text-warning"></span>
                                    <span class="bx bxs-star text-warning"></span>
                                    <span class="bx bxs-star text-warning"></span>
                                    <span class="bx bxs-star text-warning"></span>
                                    <span class="bx bxs-star"></span>
                                </p>
                                <p class="text-muted mb-4">( 152 Customers Review )</p>

                                <h6 class="text-success text-uppercase">- {{ round($product->PorDesc) }}%</h6>
                                <h5 class="mb-4">Precio : <span class="text-muted me-2"><del></del></span> <b>${{ round($product->Price) }} pesos</b></h5>
                                <p class="text-muted mb-4">{{ $product->Description }}</p>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-color">
                                    <h5 class="font-size-15">Color :</h5>
                                    <a href="javascript: void(0);" class="active">
                                        <div class="product-color-item border rounded">
                                            <img src="{{ $product->imageProduct }}" alt="" class="avatar-md">
                                        </div>
                                        <p>Black</p>
                                    </a>
                                    <a href="javascript: void(0);">
                                        <div class="product-color-item border rounded">
                                            <img src="{{ $product->imageProduct }}" alt="" class="avatar-md">
                                        </div>
                                        <p>Blue</p>
                                    </a>
                                    <a href="javascript: void(0);">
                                        <div class="product-color-item border rounded">
                                            <img src="{{ $product->imageProduct }}" alt="" class="avatar-md">
                                        </div>
                                        <p>Gray</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="mt-5">
                        <h4 class="mb-3">Especificaciones :</h4>

                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <tbody>
                                <tr>
                                    <th scope="row" style="width: 400px;" for="formrow-inputFKIdTypeProduct">Categoría: </th>
                                   <td> {{ $product->categories->ReferenceType }}- {{ $product->categories->NameCategory }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Referencia:</th>
                                    <td>{{ $product->Reference }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end Specifications -->

            <!-- end card -->
        </div>
    </div>
    <!-- end row -->

    <div class="row mt-3">
        <div class="col-lg-12">
            <div>
                <h5 class="mb-3">Productos Recientes :</h5>

                <div class="row">
                    @foreach($products as $data)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        @if($data -> imageProduct) <img src=" {{$data->imageProduct }}" alt="" class="img-fluid mx-auto d-block"> @else No registrada @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-center text-md-start pt-3 pt-md-0">
                                            <h5 class="text-truncate"><a href=" route('stores.show',$data->IdProduct) }}" class="text-dark"> {{ $data->NameProduct }}</a></h5>
                                            <p class="text-muted mb-4">
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star"></i>
                                            </p>
                                            <h5 class="my-0"><span class="text-muted me-2"><del></del></span> <b>$ {{round($data->Price) }}</b></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
@endsection


