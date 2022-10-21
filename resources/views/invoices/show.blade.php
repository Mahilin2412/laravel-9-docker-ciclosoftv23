@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <b><h3 class="mb-sm-0">Factura Detalle</h3></b>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h3 class="float-end font-size-16"><b>Factura No. {{ $hi->NumberInvoice }}</b></h3>
                            <div class="mb-4">
                                <img src="{{ url('images/logo4.PNG') }}" alt="logo" height="50">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <address>
                                    <strong><b>Cliente:</b></strong><br><br>
                                    {{ $c->FirstNameCustomer }} {{ $c->LastNameCustomer }}<br>
                                    {{ $c->mail }}<br>
                                    {{ $c->Address }}<br>
                                    Colombia
                                </address>
                            </div>
                            <div class="col-sm-6 mt-3 text-sm-end">
                                <address>
                                    <strong><b>Fecha Factura:</b></strong><br>
                                    {{ $hi->DateInvoice }}<br><br>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mt-3">
                                <address>
                                    <strong><b>Método de Pago:</b></strong><br>
                                    {{ $mp->NamePayment }}<br>
                                </address>
                            </div>
                        </div>
                        <div class="py-2 mt-3">
                            <h2 class="font-size-15 fw-bold">Detalle</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap">
                                <thead>
                                <tr>
                                    <th style="width: 70px;">No.</th>
                                    <th>Item</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>SubTotal</th>
                                    <th>Descuento</th>
                                    <th>Iva</th>
                                    <th class="text-end">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bi as $data)
                                <tr>
                                    <td>{{ $data->NroRegi }}</td>
                                    <td>{{ $data->product->NameProduct }}</td>
                                    <td>{{ $data->QuaInvoice }}</td>
                                    <td>{{ round($data->PriceUnit) }}</td>
                                    <td>{{ round($data->Subtotal) }}</td>
                                    <td>{{ round($data->DiscoUnit) }}</td>
                                    <td>{{ round($data->ValIva) }}</td>
                                    <td class="text-end">${{ $data->TotalItem = round($data->TotalItem)}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7" class="text-end"><h3 class="font-size-13 fw-bold">Sub Total</h3></td>
                                    <td class="text-end">${{ round($hi->Subtotal)}}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end"><h3 class="font-size-13 fw-bold">Total Iva</h3></td>
                                    <td class="text-end">${{ round($hi->TotalIva)}}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" class ="border-0 text-end">
                                        <h2 class="font-size-15 fw-bold"> Total</h2></td>
                                    <td class="border-0 text-end"><h4 class="m-0">${{ $hi->TotalPrice = round($hi->TotalPrice)}}</h4></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-print-none">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                <a href="javascript: void(0);" class="btn btn-primary w-md waves-effect waves-light">Enviar</a>
                                <a href="{{ route('invoices.index') }}" class="btn btn-warning w-md waves-effect waves-light">Atrás</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
@endsection
