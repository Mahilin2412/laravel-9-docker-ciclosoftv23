<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class StoreController extends Controller
{
    public function index(){
        $products = Product::all();
        //return $products;
        return view('stores.index', compact('products'));
    }
    public function show($id){
        $categories = ProductCategory::all();
        $product = Product::find($id);
        $products = Product::all();
        return view('stores.show',compact('product','categories', 'products'));
    }
}
