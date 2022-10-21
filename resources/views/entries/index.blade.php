@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        @if(session('status'))
            <div class="alert alert-{{ session('status') }}" role="alert">
                <i class="mdi mdi-{{ session('icon') }} me-2"></i>
                {{ session('response') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <div class="page-title-left">
                        <h4 class="mb-sm-0 font-size-18 ">Entradas a inventarios <a class="mr-10 bx bxs-add-to-queue font-size-18" href="{{ route('entries.create')  }}"></a></h4>
                    </div>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Entradas</a></li>
                            <li class="breadcrumb-item active">Entradas a inventarios</li>
                        </ol>
                    </div>
                    </div>

            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            @foreach($entries as $data)
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="text-lg-center">
                                        <div class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none">
                                                        <span class="avatar-title rounded-circle bg-dark text-white font-size-16">
                                                            {{ substr($data->provider->third->NameComplete,0,1) }}
                                                        </span>
                                        </div>
                                        <h5 class="mb-1 font-size-15 text-truncate">{{ $data->provider->third->NameComplete }}</h5>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div>
                                        <a href="{{ route('entries.show',$data->RmtEntry) }}" class="d-block text-primary text-decoration-none mb-2"><h5 class="mb-4 mb-lg-5">Entrada No.{{ $data->RmtEntry }}</h5></a>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount"><i class="bx bx-money me-1 text-muted"></i> ${{ number_format($data->TotalCost,2) }}</h5>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> {{ $data->CreationDate }}</h5>
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
