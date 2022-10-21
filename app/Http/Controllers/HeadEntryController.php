<?php

namespace App\Http\Controllers;

use App\Models\BodyEntry;
use App\Models\HeadEntry;
use App\Models\Provider;
use App\Models\Product;
use App\Models\Stock;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HeadEntryController extends Controller
{
    public function index(){
        $entries = HeadEntry::all();
        return view('entries.index',compact('entries'));
    }

    public function create(){
        $max = HeadEntry::maxentry();
        $providers = Provider::where('StatusProvider','1')->get(); //Solo proveedores activos
        $products  = Product::where('StatusProduct','1')->get(); //Solo productos activos
        $warehouses = WareHouse::where('StatusWareHouse','1')->get();
        return view('entries.create',compact('max','providers','products','warehouses'));

    }
    public function store(Request $request){
        //HeadEntry::storeEntry($request);
        try{
            DB::beginTransaction();

            $maxrmt = HeadEntry::maxentry();
            $Head = HeadEntry::create([
                "RmtEntry" => $maxrmt,
                "CreationDate" => $request->CreationDate,
                "DescriptionEntry" => $request->DescriptionEntry,
                "Subtotal" => $request->Subtotal,
                "CostIVA" => $request->CostIVA,
                "TotalCost" => HeadEntry::TotalPrice($request["FKIdProduct"], $request["QuanEntry"]) + $request->CostIVA,
                "FKIdProvider" => $request->FKIdProvider,
                "FKIdUser" => Auth::user()->getAuthIdentifier()
            ]);


            // GUARDAMOS EL CUERPO RECORRIENDO EL DETALLE DE LA TABLA POR MEDIO DE LOS ARRAYS QUE LLEGAN POR EL REQUEST
            foreach($request["FKIdProduct"]as $key => $value){
                $Body = BodyEntry::create([
                    "NroReg" => $key+1,
                    "FKRmtEntry" => $Head->RmtEntry,
                    "CostUnit" => HeadEntry::getprice($request["FKIdProduct"][$key]),
                    "QuanEntry" => $request["QuanEntry"][$key],
                    "Subtotal" => HeadEntry::getprice($request["FKIdProduct"][$key]) * $request["QuanEntry"][$key],
                    "FKIdWareHouse" => $request["WareHouses"][$key],
                    "FKIdProduct" => $request["FKIdProduct"][$key],
                    "FKIdUser" => Auth::user()->IdUser
                ]);

                $stockact = Stock::where("FKIdProduct",$Body->FKIdProduct)
                    ->where("FKIdWareHouse", $Body->FKIdWareHouse)->first();

                if($stockact){
                    $update = Stock::where("FKIdProduct",$Body->FKIdProduct)
                        ->where("FKIdWareHouse", $Body->FKIdWareHouse)->first()->update(["CanStock" => $stockact->CanStock + $request["QuanEntry"][$key]]);
                }else{
                    //return "en el insert";
                    $stock = Stock::create([
                        "CanStock" => $request["QuanEntry"][$key],
                        "FKIdProduct" => $request["FKIdProduct"][$key],
                        "FKIdWareHouse" => $request["WareHouses"][$key]
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('entries.index')->with([
                'response' => 'Se ha creado la entrada '.$Head->RmtEntry. ' correctamente',
                'status' => 'success',
                'icon' => 'check-all'//alert-outline
            ]);
        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('entries.index')->with([
                'response' => 'Error: '.$e->getMessage(),
                'status' => 'danger',
                'icon' => 'alert-outline'//check-all
            ]);
        }
        /*return redirect()->route('entries.index')->with([
            'response' => 'Se ha creado la entrada '.$request->RmtEntry. ' correctamente',
            'status' => 'success',
            'icon' => 'check-all'//alert-outline
        ]);*/
    }
    public function edit($id){

    }
    public function update(Request $request, $id){

    }
    public function show($id){

    }
}
