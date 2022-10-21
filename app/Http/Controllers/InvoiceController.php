<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\HeadInvoice;
use App\Models\BodyInvoice;
use App\Models\PaymentType;
use App\Models\Stock;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class InvoiceController extends Controller
{
    public function index(){

        $headinvoices = HeadInvoice::all();
        return view('invoices.index', compact('headinvoices'));
    }
    public function create(){

        $max = HeadInvoice::maxinvoice();
        $customers = Customer::all();
        $paymentype = PaymentType::all();
        $products  = DB::table('Stock')
            ->join('Products','Stock.FKIdProduct','=','Products.IdProduct')
            ->select('Products.IdProduct',
                'Products.NameProduct',
                'Products.Reference',
                'Products.PorIva',
                'Products.PorDesc',
                'Products.Price',
                DB::raw("SUM(CanStock) as CanStock"))
            ->where('Stock.CanStock','>','0')
            ->groupBy("Products.IdProduct",
                "Products.NameProduct",
                "Products.Reference",
                "Products.PorIva",
                "Products.PorDesc",
                "Products.Price")
            ->get(); //Solo productos activos
        $warehouses = WareHouse::where('StatusWareHouse','1')->get(); //Solo bodegas activas
        return view('invoices.create', compact('max', 'products', 'warehouses', 'customers', 'paymentype' ));
    }
    public function store(Request $request){
        try{
            DB::beginTransaction();
            $maxrmt = HeadInvoice::maxinvoice();
            $Head = HeadInvoice::create([
                "RmtInvoice" => $maxrmt,
                "NumberInvoice" => $request->NumberInvoice,
                "DateInvoice" => $request->CreationDate,
                "FKIdCustomer" => $request->FKIdCustomer,
                "FKIdPaymentType" => $request->FKIdPaymentType,//
                "TotalIva" => $request->TotalIva,
                "Subtotal" => $request->Subtotal,
                "TotalPrice" => HeadInvoice::TotalPrice($request["FKIdProduct"], $request["QuaInvoice"]) + $request->TotalIva,
                "FKIdUser" => Auth::user()->getAuthIdentifier()
            ]);


            // GUARDAMOS EL CUERPO RECORRIENDO EL DETALLE DE LA TABLA POR MEDIO DE LOS ARRAYS QUE LLEGAN POR EL REQUEST
            foreach($request["FKIdProduct"]as $key => $value){
                $Body = BodyInvoice::create([
                    "NroRegi" => $key+1,
                    "FKRmtInvoice" => $Head->RmtInvoice,
                    "PriceUnit" => HeadInvoice::getprice($request["FKIdProduct"][$key]),
                    "QuaInvoice" => $request["QuaInvoice"][$key],
                    "Subtotal" => HeadInvoice::getprice($request["FKIdProduct"][$key]) * $request["QuaInvoice"][$key],
                    "FKIdWareHouse" => $request["WareHouses"][$key],
                    "DiscoUnit" => $request["DiscoUnit"][$key],
                    "ValIva" => $request["DiscoUnit"][$key],
                    "TotalItem" => $request["TotalItem"][$key],
                    "FKIdProduct" => $request["FKIdProduct"][$key],
                    "FKIdUser" => Auth::user()->IdUser
                ]);

                $stockact = Stock::where("FKIdProduct",$Body->FKIdProduct)
                    ->where("FKIdWareHouse", $Body->FKIdWareHouse)->first();

                if($stockact){
                    $update = Stock::where("FKIdProduct",$Body->FKIdProduct)
                        ->where("FKIdWareHouse", $Body->FKIdWareHouse)->first()->update(["CanStock" => $stockact->CanStock - $request["QuaInvoice"][$key]]);
                }else{
                    //return "en el insert";
                    $stock = Stock::create([
                        "CanStock" => $request["QuaInvoice"][$key],
                        "FKIdProduct" => $request["FKIdProduct"][$key],
                        "FKIdWareHouse" => $request["WareHouses"][$key]
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('invoices.index')->with([
                'response' => 'Se ha creado la factura '.$Head->NumberInvoice. ' correctamente',
                'status' => 'success',
                'icon' => 'check-all'//alert-outline
            ]);

        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('invoices.index')->with([
                'response' => 'Error: '.$e->getMessage(),
                'status' => 'Danger',
                'icon' => 'alert-outline'//check-all
            ]);
        }

    }
    public function edit($id){

        //return view('invoices.edit', compact('invoices'));
    }
    public function update(Request $request, $id){

    }
    public function show($id){
        $hi = HeadInvoice::find($id);
        $bi = BodyInvoice::get();//::where('FKRmtInvoice',' = ',2)->get();
        $bi = $bi->where('FKRmtInvoice',' = ',$hi->RmtInvoice);
        $c = Customer::find($hi->FKIdCustomer);
        $mp = PaymentType::find($hi->FKIdPaymentType);
        return view('invoices.show', compact('hi', 'bi', 'c', 'mp'));
    }

    public function WareHouses(Request $request){
        try {
            if(isset($request->texto)){
                $WareHouses = DB::table('Stock')
                    ->join('warehouses','Stock.FKIdWareHouse','=','warehouses.IdWareHouse')
                    ->select('warehouses.IdWareHouse',
                        'warehouses.ReferenceWareHouse',
                        'warehouses.Name',
                        'Stock.CanStock'
                    )
                    ->where('Stock.CanStock','>','0')
                    ->where('Stock.FKIdProduct','=',$request->texto)
                    ->get(); //Solo productos activos
                //$WareHouses = WareHouse::all();
                return response()->json(
                    [
                        'lista' => $WareHouses,
                        'success' => true
                    ]
                );
            }else{
                return response()->json(
                    [
                        'success' => false
                    ]
                );

            }
        }catch(\Exception $e){
           return redirect()->route('products.index');
        }
    }
}
