@extends('layouts.admin.app')

@section('content')
    <form action="{{ route('invoices.index') }}" method="POST">
        @csrf
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
                            <div class="row mb-4 float-end">
                                <label for="horizontal-firstname-input" class="col-sm-6 col-form-label float-end"><h4>Número de Factura: </h4></label><br>
                                <div class="col-sm-5">
                                    <input type="text" name="NumberInvoice" class="form-control float-end" id="horizontal-firstname-input">
                                </div>
                            </div>
                            <div class="mb-4">
                                <img src="{{ url('images/logo4.PNG') }}" alt="logo" height="50">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <address>
                                            <label for="FKIdCustomer" class="col-sm-3 col-form-label"><strong><b>Cliente: *</b></strong></label>
                                            <select id="FKIdCustomer" class="form-select" name="FKIdCustomer" required onchange="colocar_correo(), colocar_direccion()">
                                                <option selected="" disabled>Seleccionar...</option>
                                                @foreach($customers as $data)
                                                    <option correo="{{$data->mail}}" direccion="{{$data->Address}}" value="{{$data->IdCustomer}}">{{$data->FirstNameCustomer}} {{$data->SecondNameCustomer}} {{$data->LastNameCustomer}} {{$data->SecondLastNameCustomer}} </option>
                                                @endforeach
                                            </select><br>
                                    <div class="col-sm-12">
                                        <br><label for="correo" class="form-label">Correo</label>
                                        <input id="correo" name="correo" type="text" class="form-control" disabled required min="1">
                                    </div><br>
                                    <div class="col-sm-12">
                                        <label for="direccion" class="form-label">Dirección: </label>
                                        <input id="direccion" name="direccion" type="text" class="form-control" disabled required min="1">
                                    </div>
                                </address>
                            </div>
                            <div class="col-sm-2 mt-2 text-sm-start"></div>
                            <div class="col-sm-4 mt-2 text-sm-end"></div>
                            <div class="col-sm-2 mt-2 text-sm-end">
                                <address>
                                    <label for="CreationDate" class="form-label"><strong><b>Fecha Factura: *</b></strong></label>
                                    <input type="date" id="CreationDate" name="CreationDate" class="form-control" required>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 mt-3">
                                <address>

                                        <label for="FKIdPaymentType" class="col-sm-6 col-form-label"><strong><b>Método de Pago: *</b></strong></label>
                                        <select id="FKIdPaymentType" class="form-select" name="FKIdPaymentType" required>
                                        <option selected="" disabled>Seleccionar...</option>
                                            @foreach($paymentype as $data)
                                                <option value="{{$data->IdPaymentType}}">{{$data->NamePayment}}</option>
                                            @endforeach
                                        </select><br>
                                    <br>
                                </address>
                            </div>
                            <div class="col-sm-3 mt-3 text-sm-start"></div>
                        </div>
                        <div class="py-2 mt-3">
                            <h2 class="font-size-15 fw-bold">Detalle</h2>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <label for="FKIdProduct" class="form-label">Producto *</label>
                                <select id="FKIdProduct" class="form-select nieve" name="FKIdProduct" required  onchange="colocar_precio()">
                                    <option selected="" disabled>Seleccionar...</option>
                                    @foreach($products as $data)
                                        <option content="{{ csrf_token() }}" porDesc="{{ $data->PorDesc }}" CanStock ="{{ $data->CanStock }}" iva="{{ $data->PorIva }}" precio="{{ $data->Price }}" refer="{{ $data->Reference }}" namepro="{{ $data->NameProduct }}" value="{{$data->IdProduct}}">{{ $data->Reference }} | {{$data->NameProduct}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <label for="QuaInvoice" class="form-label">Cantidad *</label>
                                <input id="QuaInvoice" name="QuaInvoice" type="number" class="form-control" required min="1">
                            </div>
                            <div class="col-sm-2">
                                <label for="precio" class="form-label">Precio *</label>
                                <input id="precio" name="precio" type="number" class="form-control" disabled required min="1">
                            </div>
                            <div class="col-sm-3">
                                <label for="FKIdWareHouse" class="form-label">Bodega *</label>
                                <select id="FKIdWareHouse" class="form-select" name="FKIdWareHouse" required>
                                    <option selected="" disabled>Seleccionar...</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button onclick="agregar_item()" type="button"
                                        class="form-control btn btn-primary w-md waves-effect waves-light mt-4">Agregar</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap rwd-table-id" id="rwd-table-id">
                                <thead>
                                <tr>
                                    <th style="width: 70px;">No.</th>
                                    <th>Producto</th>
                                    <th>Bodega</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>SubTotal</th>
                                    <th>Iva</th>
                                    <th>Descuento</th>
                                    <th class="text-end">Total</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody id="tblItems">

                                </tbody>
                            </table>
                        </div>
                        <hr>

                        <!--SUB TOTAL GENERAL DE LA FACTURA-->
                        <div class="row">
                            <div class="d-print-none">
                                <div class="float-end mb-2">
                                    Subtotal: <input type="number" id="Subtotal" name="Subtotal" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <!--IVA GENERAL DE LA FACTURA-->
                        <div class="row">
                            <div class="d-print-none">
                                <div class="float-end mb-2">
                                    IVA: <input type="number" id="TotalIva" name="TotalIva" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <!--TOTAL GENERAL DE LA FACTURA-->
                        <div class="row">
                            <div class="d-print-none">
                                <div class="float-end mb-2">
                                    Total: <input type="number" id="TotalPrice" name="TotalPrice" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="d-print-none">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Guardar</button>
                                <a href="{{ route('invoices.index') }}" class="btn btn-warning w-md waves-effect waves-light">Atrás</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    </form>
@endsection

@section("script")
    <script>
        function colocar_precio() {
            let precio = $("#FKIdProduct option:selected").attr("precio");
            let item_id = $("#FKIdProduct option:selected").val();
            let token = $("#FKIdProduct option:selected").attr("content");
            $("#precio").val(precio);

            //const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
                fetch('http://127.0.0.1:8000/apiwareHouses',{
                    method : 'POST',
                    body: JSON.stringify({texto : item_id}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": token
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    var opciones ="<option disabled value=''>Seleccionar...</option>";
                    for (let i in data.lista) {
                        opciones+= '<option NameBod="'+ data.lista[i].Name +'" CanStock="'+ data.lista[i].CanStock +'" value="'+data.lista[i].IdWareHouse+'">'+data.lista[i].ReferenceWareHouse +' '+ data.lista[i].Name +'</option>';
                    }
                    document.getElementById("FKIdWareHouse").innerHTML = opciones;
                }).catch(error =>console.error(error))
        }
        function colocar_correo() {
            let correo = $("#FKIdCustomer option:selected").attr("correo");
            $("#correo").val(correo);
        }
        function colocar_direccion() {
            let direccion = $("#FKIdCustomer option:selected").attr("direccion");
            $("#direccion").val(direccion);
        }
        function agregar_item() {

            let item_id = $("#FKIdProduct option:selected").val();
            let Bod_Id = $("#FKIdWareHouse option:selected").val();
            var resume_table = document.getElementById("rwd-table-id");

            for (var i = 0, row; row = resume_table.rows[i]; i++) {
                //alert(cell[i].innerText);
                let id = row.id;

                let idval = 'tr-'+item_id+'-'+Bod_Id;
                if (id == idval){
                    alert('El producto ya se encuentra agregado para la bodega digitada, no se puede adicionar nuevamente');
                    return;
                }
            }


            let dollarUS = Intl.NumberFormat("en-US", {}); // formato de moneda


            let item_text = $("#FKIdProduct option:selected").attr("namepro");
            let PorDesc = $("#FKIdProduct option:selected").attr("porDesc");
            let CanStock = $("#FKIdWareHouse option:selected").attr("CanStock");
            let item_refe = $("#FKIdProduct option:selected").attr("refer");
            let item_poriva = $("#FKIdProduct option:selected").attr("iva");
            let Bodega_Id = $("#FKIdWareHouse option:selected").val();
            let Bodega = $("#FKIdWareHouse option:selected").attr("NameBod");
            let cantidad = $("#QuaInvoice").val();
            let precio = $("#precio").val();
            let SubtotalInv = parseInt(cantidad) * parseInt(precio);

            let descuentoValor = SubtotalInv * parseInt(PorDesc) / 100;
            let Valor_iva = SubtotalInv * parseInt(item_poriva) / 100;
            let total = SubtotalInv + Valor_iva - descuentoValor;

            if (cantidad > 0 && precio > 0 && Bodega_Id > 0) {
                console.log(CanStock);
                if( parseInt(cantidad) > parseInt(CanStock)){
                    alert("La cantidad: "+ cantidad + " Es mayor a la disponible: "+CanStock+ " En la bodega: " + Bodega);
                    return;
                }

                $("#tblItems").append(`
                    <tr id="tr-${item_id}-${Bodega_Id}">
                        <td>${item_refe}</td>
                        <td>
                            <input type="hidden" name="FKIdProduct[]" value="${item_id}" />
                            <input type="hidden" name="QuaInvoice[]" value="${cantidad}" />
                            <input type="hidden" name="SubtotalInv[]" value="${SubtotalInv}" />
                            <input type="hidden" name="PriceUnit[]" value="${precio}" />
                            <input type="hidden" name="WareHouses[]" value="${Bodega_Id}" />
                            <input type="hidden" name="DiscoUnit[]" value="${descuentoValor}" />
                            <input type="hidden" name="ValIva[]" value="${Valor_iva}" />
                            <input type="hidden" name="TotalItem[]" value="${total}" />
                            ${item_text}
                        </td>
                        <td>${Bodega}</td>
                        <td>${cantidad}</td>
                        <td class="text-end">${dollarUS.format(precio)}</td>
                        <td class="text-end">${dollarUS.format(SubtotalInv)}</td>
                        <td class="text-end">${dollarUS.format(Valor_iva)}</td>
                        <td class="text-end">${dollarUS.format(descuentoValor)}</td>
                        <td class="text-end">${dollarUS.format(total)}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_item(${item_id},${Bodega_Id},${SubtotalInv}, ${Valor_iva},${total})">X</button>
                        </td>
                    </tr>
                `);

                //Se calcula el subtotal general acumulando
                let Subtotal_cabeza = $("#Subtotal").val() || 0;
                $("#Subtotal").val(parseInt(Subtotal_cabeza) + SubtotalInv);

                //Se calcula el subtotal general acumulando
                let Iva_cabeza = $("#TotalIva").val() || 0;
                $("#TotalIva").val(parseInt(Iva_cabeza) + Valor_iva);

                let Total_cabeza = $("#TotalPrice").val() || 0;
                $("#TotalPrice").val(parseInt(Total_cabeza) + total);
            } else {
                alert("Se debe ingresar una cantidad, precio o bodega valido");
            }
        }
        function eliminar_item(id, Bodega_Id,subtotal, iva, total) {

            // resta el subtotal de la salida en general
            $("#tr-"+id+"-"+Bodega_Id).remove();
            let subtotalf = $("#Subtotal").val() || 0;
            $("#Subtotal").val(parseInt(subtotalf) - subtotal);

            let ivaf = $("#TotalIva").val() || 0;
            $("#TotalIva").val(parseInt(ivaf) - iva);

            let totalf = $("#TotalPrice").val() || 0;
            $("#TotalPrice").val(parseInt(totalf) - total);
        }
    </script>
@endsection
