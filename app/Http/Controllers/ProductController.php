<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',compact('products'));
    }
    public function create(){
        $categories = ProductCategory::all();
        return view('products.create', compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'imageProduct' => 'image|max:2048'
        ]);
        Product::storeProduct($request);
        return redirect()->route('products.index')->with([
            'response' => 'Se ha creado el producto '.$request->NameProduct,
            'status' => 'success',
            'icon' => 'check-all'//alert-outline
        ] );
    }
    public function edit($id){
        $categories = ProductCategory::all();
        $product= Product::find($id);
        return view('products.edit',compact('product','categories'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'imageProduct' => 'image|max:2048'
        ]);
        Product::updateProduc($request, $id);
        return redirect()->route('products.index')->with([
            'response' => 'Se ha actualizado el producto '.$request->NameProduct,
            'status' => 'warning',
            'icon' => 'alert-outline'//alert-outline
        ]);
    }
    public function show($id){
        $categories = ProductCategory::all();
        $product = Product::find($id);
        return view('products.show',compact('product','categories'));
    }
}
