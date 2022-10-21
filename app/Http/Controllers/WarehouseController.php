<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WareHouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(){
        $warehouses = WareHouse::all();
        return view('warehouse.index',compact('warehouses'));
    }
    public function create(){
        $users = User::all();
        return view('warehouse.create', compact('users'));
    }
    public function store(Request $request){
        $request->validate([
            'ReferenceWareHouse' => 'required',
            'Name' => 'required'
        ]);
        $warehouse = WareHouse::create($request->all());
        return redirect()->route('warehouses.index')->with([
            'response' => 'Se ha creado la Bodega '.$request->ReferenceWareHouse. ' - '.$request->Name,
            'status' => 'success',
            'icon' => 'check-all'//alert-outline
        ] );
    }
    public function edit($id){
        $users = User::all();
        $warehouse = WareHouse::find($id);
        return view('warehouse.edit', compact('users','warehouse'));
    }
    public function update(Request $request, $id){
        $warehouse = WareHouse::find($id)->update($request->all());
        return redirect()->route('warehouses.index')->with([
            'response' => 'Se ha actualizado la bodega '.$request->NameProduct,
            'status' => 'warning',
            'icon' => 'alert-outline'//alert-outline
        ]);
    }
    public function show($id){
        $users = User::all();
        $warehouse = WareHouse::find($id);
        return view('warehouse.show',compact('warehouse','users'));
    }
}
