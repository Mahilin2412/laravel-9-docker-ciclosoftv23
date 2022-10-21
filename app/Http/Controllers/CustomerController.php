<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\DocumentType;
use App\Models\Gender;
use App\Models\Third;


class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $documenttypes = DocumentType::all();
        $genders = Gender::all();
        return view('customers.create', compact('documenttypes','genders'));
    }

    public function store(Request $request, Customer $customer)
    {
        $request->validate([
            'FirstNameCustomer' => 'required|max:20'
        ]);
        $third = Third::where('NumIdentification', '=', $request->NumIdentification)
            ->where('FKIdTypeDoc', '=' ,$request->FKIdTypeDoc)->first();

        Customer::storeCustomer($request, $third);
        return redirect()->route('customers.index')->with([
            'response' => 'Se ha creado el cliente '.$customer->FirstNameCustomer. ' correctamente',
            'status' => 'success',
            'icon' => 'check-all'//alert-outline
        ]);

    }

    public function edit($id)
    {
        $documenttypes = DocumentType::all();
        $genders = Gender::all();
        $customer= Customer::find($id);
        return view('customers.edit',compact('customer', 'documenttypes', 'genders'));
    }

    public function update(Request $request, $id)
    {
        $third = Third::where('NumIdentification', '=', $request->NumIdentification)
            ->where('FKIdTypeDoc', '=' ,$request->FKIdTypeDoc)->first();

        Customer::updateCustomer($request, $id, $third);
        return redirect()->route('customers.index')->with([
            'response' => 'Se ha actualizado el cliente '.$request->FirstNameCustomer. ' exitosamente.',
            'status' => 'warning',
            'icon' => 'alert-outline'//alert-outline
        ]);
    }

    public function show($id)
    {
        $documenttypes = DocumentType::all();
        $genders = Gender::all();
        $customer= Customer::find($id);
        return view('customers.edit',compact('customer', 'documenttypes', 'genders'));
    }
}
