@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                @if(session('status'))
                    <div class="alert alert-{{ session('status') }}" role="alert">
                        <i class="mdi mdi-{{ session('icon') }} me-2"></i>
                        {{ session('response') }}
                    </div>
                @endif
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Productos</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Filter</h4>

                        <div>
                            <h5 class="font-size-14 mb-3">Clothes</h5>
                            <ul class="list-unstyled product-list">
                                <li><a href="javascript: void(0);"><i class="mdi mdi-chevron-right me-1"></i> T-shirts</a></li>
                                <li><a href="javascript: void(0);"><i class="mdi mdi-chevron-right me-1"></i> Shirts</a></li>
                                <li><a href="javascript: void(0);"><i class="mdi mdi-chevron-right me-1"></i> Jeans</a></li>
                                <li><a href="javascript: void(0);"><i class="mdi mdi-chevron-right me-1"></i> Jackets</a></li>
                            </ul>
                        </div>
                        <div class="mt-4 pt-3">
                            <h5 class="font-size-14 mb-3">Price</h5>
                            <span class="irs irs--square js-irs-0 irs-with-grid"><span class="irs"><span class="irs-line" tabindex="0"></span><span class="irs-min" style="visibility: hidden;">$0</span><span class="irs-max" style="visibility: hidden;">$1 000</span><span class="irs-from" style="visibility: visible; left: 7.90636%;">$200</span><span class="irs-to" style="visibility: visible; left: 61.8031%;">$800</span><span class="irs-single" style="visibility: hidden; left: 17.5721%;">$200 — $800</span></span><span class="irs-grid" style="width: 90.2512%; left: 4.77441%;"><span class="irs-grid-pol" style="left: 0%"></span><span class="irs-grid-text js-grid-text-0" style="left: 0%; margin-left: -5.23416%;">0</span><span class="irs-grid-pol small" style="left: 20%"></span><span class="irs-grid-pol small" style="left: 15%"></span><span class="irs-grid-pol small" style="left: 10%"></span><span class="irs-grid-pol small" style="left: 5%"></span><span class="irs-grid-pol" style="left: 25%"></span><span class="irs-grid-text js-grid-text-1" style="left: 25%; visibility: visible; margin-left: -10.6024%;">250</span><span class="irs-grid-pol small" style="left: 45%"></span><span class="irs-grid-pol small" style="left: 40%"></span><span class="irs-grid-pol small" style="left: 35%"></span><span class="irs-grid-pol small" style="left: 30%"></span><span class="irs-grid-pol" style="left: 50%"></span><span class="irs-grid-text js-grid-text-2" style="left: 50%; visibility: visible; margin-left: -10.8422%;">500</span><span class="irs-grid-pol small" style="left: 70%"></span><span class="irs-grid-pol small" style="left: 65%"></span><span class="irs-grid-pol small" style="left: 60%"></span><span class="irs-grid-pol small" style="left: 55%"></span><span class="irs-grid-pol" style="left: 75%"></span><span class="irs-grid-text js-grid-text-3" style="left: 75%; visibility: visible; margin-left: -10.4754%;">750</span><span class="irs-grid-pol small" style="left: 95%"></span><span class="irs-grid-pol small" style="left: 90%"></span><span class="irs-grid-pol small" style="left: 85%"></span><span class="irs-grid-pol small" style="left: 80%"></span><span class="irs-grid-pol" style="left: 100%"></span><span class="irs-grid-text js-grid-text-4" style="left: 100%; margin-left: -13.4664%;">1 000</span></span><span class="irs-bar" style="left: 22.9246%; width: 54.1507%;"></span><span class="irs-shadow shadow-from" style="display: none;"></span><span class="irs-shadow shadow-to" style="display: none;"></span><span class="irs-handle from" style="left: 18.0502%;"><i></i><i></i><i></i></span><span class="irs-handle to type_last" style="left: 72.2009%;"><i></i><i></i><i></i></span></span><input type="text" id="pricerange" class="irs-hidden-input" tabindex="-1" readonly="">
                        </div>

                        <div class="mt-4 pt-3">
                            <h5 class="font-size-14 mb-3">Discount</h5>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="productdiscountCheck1">
                                <label class="form-check-label" for="productdiscountCheck1">
                                    Less than 10%
                                </label>
                            </div>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="productdiscountCheck2">
                                <label class="form-check-label" for="productdiscountCheck2">
                                    10% or more
                                </label>
                            </div>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="productdiscountCheck3" checked="">
                                <label class="form-check-label" for="productdiscountCheck3">
                                    20% or more
                                </label>
                            </div>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="productdiscountCheck4">
                                <label class="form-check-label" for="productdiscountCheck4">
                                    30% or more
                                </label>
                            </div>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="productdiscountCheck5">
                                <label class="form-check-label" for="productdiscountCheck5">
                                    40% or more
                                </label>
                            </div>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="productdiscountCheck6">
                                <label class="form-check-label" for="productdiscountCheck6">
                                    50% or more
                                </label>
                            </div>

                        </div>

                        <div class="mt-4 pt-3">
                            <h5 class="font-size-14 mb-3">Customer Rating</h5>
                            <div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="productratingCheck1">
                                    <label class="form-check-label" for="productratingCheck1">
                                        4 <i class="bx bxs-star text-warning"></i>  &amp; Above
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="productratingCheck2">
                                    <label class="form-check-label" for="productratingCheck2">
                                        3 <i class="bx bxs-star text-warning"></i>  &amp; Above
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="productratingCheck3">
                                    <label class="form-check-label" for="productratingCheck3">
                                        2 <i class="bx bxs-star text-warning"></i>  &amp; Above
                                    </label>
                                </div>

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="productratingCheck4">
                                    <label class="form-check-label" for="productratingCheck4">
                                        1 <i class="bx bxs-star text-warning"></i>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-9">

                <div class="row mb-3">
                    <div class="col-xl-4 col-sm-6">
                        <div class="mt-2">
                            <h5>Clothes</h5>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-6">
                        <form class="mt-4 mt-sm-0 float-sm-end d-sm-flex align-items-center">
                            <div class="search-box me-2">
                                <div class="position-relative">
                                    <input type="text" class="form-control border-0" placeholder="Search...">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                            <ul class="nav nav-pills product-view-nav justify-content-end mt-3 mt-sm-0">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#"><i class="bx bx-grid-alt"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bx bx-list-ul"></i></a>
                                </li>
                            </ul>


                        </form>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $data)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="product-img position-relative">
                                    <div class="avatar-sm product-ribbon">
                                                        <span class="avatar-title rounded-circle  bg-primary">
                                                            - {{ round($data->PorDesc) }}%
                                                        </span>
                                    </div>
                                    @if($data->imageProduct) <img src="{{ $data->imageProduct }}" class="img-fluid mx-auto d-block"> @else No registrada @endif
                                </div>
                                <div class="mt-4 text-center">
                                    <h5 class="mb-3 text-truncate"><a href="{{ route('stores.show',$data->IdProduct) }}" class="text-dark">{{ $data->NameProduct }} </a></h5>

                                    <p class="text-muted">
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </p>
                                    <h5 class="my-0"><span class="text-muted me-2"><del></del></span> <b>${{ round($data->Price) }}</b></h5><br><br>
                                    <a href="ecommerce-checkout.html" class="btn btn-success">
                                        <i class="mdi mdi-cart-arrow-right me-1"></i> Checkout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <ul class="pagination pagination-rounded justify-content-center mt-3 mb-4 pb-1">
                            <li class="page-item disabled">
                                <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="javascript: void(0);" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">4</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">5</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->

@endsection
