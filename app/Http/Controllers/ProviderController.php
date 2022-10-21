<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\DocumentType;
use App\Models\Gender;
use App\Models\Provider;
use App\Models\Third;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(){
        $providers = Provider::all();
        return view('providers.index',compact('providers'));
    }
    public function create(){
        $documenttypes = DocumentType::all();
        $genders = Gender::all();
        return view('providers.create', compact('documenttypes','genders'));
    }
    public function store(Request $request, Provider $provider){
        $third = Third::where('NumIdentification', '=', $request->NumIdentification)
            ->where('FKIdTypeDoc', '=' ,$request->FKIdTypeDoc)->first();

        Provider::storeProvider($request, $third);
        return redirect()->route('providers.index')->with([
                'response' => 'Se ha creado el proveedor '.$provider->FirstNameProvider. ' correctamente',
                'status' => 'success',
                'icon' => 'check-all'//alert-outline
            ]);
    }
    public function edit($id){
        $documenttypes = DocumentType::all();
        $genders = Gender::all();
        $provider= Provider::find($id);
        return view('providers.edit',compact('provider', 'documenttypes', 'genders'));
    }
    public function update(Request $request, $id){
        $third = Third::where('NumIdentification', '=', $request->NumIdentification)
            ->where('FKIdTypeDoc', '=' ,$request->FKIdTypeDoc)->first();

        Provider::updateProvider($request, $id, $third);
        return redirect()->route('providers.index')->with([
            'response' => 'Se ha actualizado el proveedor '.$request->FirstNameProvider. ' exitosamente.',
            'status' => 'warning',
            'icon' => 'alert-outline'//alert-outline
        ]);
    }
    public function show($id){
        $documenttypes = DocumentType::all();
        $genders = Gender::all();
        $provider= Provider::find($id);
        return view('providers.edit',compact('provider', 'documenttypes', 'genders'));
    }
}
