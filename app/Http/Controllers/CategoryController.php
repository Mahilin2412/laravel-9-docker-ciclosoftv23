<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productcategory;

class CategoryController extends Controller
{
    public function index(){
        $categories = Productcategory::all();
        return view('categories.index',compact('categories'));
    }
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        $category= Productcategory::create($request->all());
        return redirect()->route('categories.index')->with([
            'response' => 'Se ha creado la categoria '.$category->NameCategory. ' correctamente',
            'status' => 'success',
            'icon' => 'check-all'//alert-outline
        ]);
    }
    public function edit($id){
        $category = Productcategory::find($id);
        return view('categories.edit',compact('category'));
    }
    public function update(Request $request, $id){
        $category = Productcategory::find($id)->update($request->all());
        return redirect()->route('categories.index')->with([
            'response' => 'Se ha actualizado la categoria '.$request->NameCategory,
            'status' => 'warning',
            'icon' => 'alert-outline'//alert-outline
        ]);
    }
    public function show($id){
        $category = Productcategory::find($id);
        return view('categories.show',compact('category'));
    }
}
