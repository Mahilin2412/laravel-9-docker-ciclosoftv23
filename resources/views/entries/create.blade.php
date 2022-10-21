@extends('layouts.admin.app')

@section('content')
<form action="{{ route('entries.index') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            @if(session('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">
                    <i class="mdi mdi-{{ session('icon') }} me-2"></i>
                    {{ session('response') }}
                </div>
            @endif
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Entradas</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Entradas</a></li>
                        <li class="breadcrumb-item active">Nueva Entrada</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <strong class="float-end font-size-20">Entrada # {{ $max }}</strong>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                                <label for="FKIdProvider" class="form-label">Proveedor *</label>
                                <select id="FKIdProvider" class="form-select" name="FKIdProvider" required>
                                    <option selected="" disabled>Seleccionar...</option>
                                    @foreach($providers as $data)
                                        <option value="{{$data->IdProvider}}">{{$data->third->NameComplete}} </option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-sm-6 text-sm">
                            <label for="CreationDate" class="form-label">Fecha Entrada*</label>
                            <input type="date" id="CreationDate" name="CreationDate" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="DescriptionEntry">Descripción</label>
                            <textarea class="form-control" id="DescriptionEntry" name="DescriptionEntry"></textarea>
                        </div>
                    </div>
                    <div class="py-2 mt-3">
                        <h3 class="font-size-15 fw-bold">Items</h3>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label for="FKIdProduct" class="form-label">Producto *</label>
                            <select id="FKIdProduct" class="form-select" name="FKIdProduct" required  onchange="colocar_precio()">
                                <option selected="" disabled>Seleccionar...</option>
                                @foreach($products as $data)
                                    <option iva="{{ $data->PorIva }}" precio="{{ $data->Price }}" refer="{{ $data->Reference }}" namepro="{{ $data->NameProduct }}" value="{{$data->IdProduct}}">{{ $data->Reference }} | {{$data->NameProduct}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label for="QuanEntry" class="form-label">Cantidad *</label>
                            <input id="QuanEntry" name="QuanEntry" type="number" class="form-control" required min="1">
                        </div>
                        <div class="col-sm-2">
                            <label for="precio" class="form-label">Precio *</label>
                            <input id="precio" name="precio" type="number" class="form-control" disabled required min="1">
                        </div>
                        <div class="col-sm-3">
                            <label for="FKIdWareHouse" class="form-label">Bodega *</label>
                            <select id="FKIdWareHouse" class="form-select" name="FKIdWareHouse" required>
                                <option selected="" disabled>Seleccionar...</option>
                                @foreach($warehouses as $data)
                                    <option nomebod="{{ $data->Name  }}" value="{{$data->IdWareHouse}}">{{ $data->ReferenceWareHouse }} | {{ $data->Name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button onclick="agregar_item()" type="button"
                                    class="form-control btn btn-primary w-md waves-effect waves-light mt-4">Agregar</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-nowrap rwd-table-id" id="rwd-table-id"><!--table table-nowrap -->
                            <thead>
                            <tr>
                                <th style="width: 70px;">No.</th>
                                <th>Nombre Producto</th>
                                <th>Bodega</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>Iva</th>
                                <th>Total</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody id="tblItems">

                            </tbody>
                        </table>
                    </div>
                    <hr>

                    <!--SUB TOTAL GENERAL DE LA ENTRADA-->
                    <div class="row">
                        <div class="d-print-none">
                            <div class="float-end mb-2">
                                Subtotal: <input type="number" id="Subtotal" name="Subtotal" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <!--IVA GENERAL DE LA ENTRADA-->
                    <div class="row">
                        <div class="d-print-none">
                            <div class="float-end mb-2">
                                IVA: <input type="number" id="CostIVA" name="CostIVA" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <!--TOTAL GENERAL DE LA ENTRADA-->
                    <div class="row">
                        <div class="d-print-none">
                            <div class="float-end mb-2">
                                Total: <input type="number" id="TotalCost" name="TotalCost" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="d-print-none">
                        <div class="float-end">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Guardar</button>
                            <a class="btn btn-warning w-md" href="{{ route('entries.index') }}">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section("script")
    <script>
        function colocar_precio() {
            let precio = $("#FKIdProduct option:selected").attr("precio");
            $("#precio").val(precio);
        }

        function agregar_item() {

            let item_id = $("#FKIdProduct option:selected").val();
            var resume_table = document.getElementById("rwd-table-id");

            for (var i = 0, row; row = resume_table.rows[i]; i++) {
                //alert(cell[i].innerText);
                let id = row.id;

                let idval = 'tr-'+item_id;
                if (id == idval){
                    alert('El producto ya se encuentra en el detalle, no se puede adicionar nuevamente');
                    return;
                }

                /*for (var j = 0, col; col = row.cells[j]; j++) {
                    //alert(col[j].innerText);
                    console.log(`Txt: ${col.innerText} \tFila: ${i} \t Celda: ${j} \t key: ${col.itemvalue}`);
                    //console.log(${col.accesskey});
                }*/
            }


            let dollarUS = Intl.NumberFormat("en-US", {}); // formato de moneda


            let item_text = $("#FKIdProduct option:selected").attr("namepro");
            let item_refe = $("#FKIdProduct option:selected").attr("refer");
            let item_poriva = $("#FKIdProduct option:selected").attr("iva");
            let Bodega_Id = $("#FKIdWareHouse option:selected").val();
            let Bodega = $("#FKIdWareHouse option:selected").attr("nomebod");
            let cantidad = $("#QuanEntry").val();
            let precio = $("#precio").val();
            let SubtotalDet = parseInt(cantidad) * parseInt(precio);

            let Valor_iva = SubtotalDet * parseInt(item_poriva) / 100;
            let total = SubtotalDet + Valor_iva;

            if (cantidad > 0 && precio > 0 && Bodega_Id > 0) {

                $("#tblItems").append(`
                    <tr id="tr-${item_id}">
                        <td>${item_refe}</td>
                        <td>
                            <input type="hidden" name="FKIdProduct[]" value="${item_id}" />
                            <input type="hidden" name="QuanEntry[]" value="${cantidad}" />
                            <input type="hidden" name="SubtotalDet[]" value="${SubtotalDet}" />
                            <input type="hidden" name="CostUnit[]" value="${precio}" />
                            <input type="hidden" name="WareHouses[]" value="${Bodega_Id}" />
                            ${item_text}
                        </td>
                        <td>${Bodega}</td>
                        <td>${cantidad}</td>
                        <td class="text-end">${dollarUS.format(precio)}</td>
                        <td class="text-end">${dollarUS.format(SubtotalDet)}</td>
                        <td class="text-end">${dollarUS.format(Valor_iva)}</td>
                        <td class="text-end">${dollarUS.format(total)}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_item(${item_id}, ${SubtotalDet}, ${Valor_iva},${total})">X</button>
                        </td>
                    </tr>
                `);

                //Se calcula el subtotal general acumulando
                let Subtotal_cabeza = $("#Subtotal").val() || 0;
                $("#Subtotal").val(parseInt(Subtotal_cabeza) + SubtotalDet);

                //Se calcula el subtotal general acumulando
                let Iva_cabeza = $("#CostIVA").val() || 0;
                $("#CostIVA").val(parseInt(Iva_cabeza) + Valor_iva);

                let Total_cabeza = $("#TotalCost").val() || 0;
                $("#TotalCost").val(parseInt(Total_cabeza) + total);
            } else {
                alert("Se debe ingresar una cantidad, precio o bodega valido");
            }
        }


        function eliminar_item(id, subtotal, iva, total) {

            // resta el subtotal de la salida en general
            $("#tr-" + id).remove();
            let subtotalf = $("#Subtotal").val() || 0;
            $("#Subtotal").val(parseInt(subtotalf) - subtotal);

            let ivaf = $("#CostIVA").val() || 0;
            $("#CostIVA").val(parseInt(ivaf) - iva);

            let totalf = $("#TotalCost").val() || 0;
            $("#TotalCost").val(parseInt(totalf) - total);
        }

    </script>
@endsection
