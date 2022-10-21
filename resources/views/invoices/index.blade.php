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

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"><h2>Facturas</h2></li>
                        </ol>
                    </div>
                    <div class="page-title-left">
                        <ol class="breadcrumb m-0">
                            <a class="btn btn-primary w-md" href="{{ route('invoices.create') }}"><i class="bx bxs-file-plus"></i> Agregar Factura</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            @foreach($headinvoices as $data)
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="text-lg-center">
                                    <div class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                                            M
                                                        </span>
                                    </div>
                                    <h5 class="mb-1 font-size-15 text-truncate">{{ $data->customer->FirstNameCustomer }} {{ $data->customer->LastNameCustomer }}</h5>
                                    <a href="javascript: void(0);" class="text-muted">@Skote</a>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div>
                                    <a href="{{ route('invoices.show',$data->RmtInvoice) }}" class="d-block text-primary text-decoration-underline mb-2">Factura No.{{ $data->NumberInvoice }}</a>
                                    <h5 class="text-truncate mb-4 mb-lg-5">Skote Dashboard UI</h5>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-3">
                                            <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount"><i class="bx bx-money me-1 text-muted"></i> ${{ $data->TotalPrice }}</h5>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> {{ $data->DateInvoice }}</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
