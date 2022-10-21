<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='Products';
    protected $primaryKey='IdProduct';
    protected $fillable=[
        'NameProduct', 'Reference', 'ManIva','PorIva', 'PorDesc', 'Price', 'StatusProduct', 'Description', 'imageProduct','FKIdTypeProduct','FKIdUser'
    ];

    public function users(){
        return $this->belongsTo('App\Models\User','FKIdUser','IdUser');
    }
    public function categories(){
        return $this->belongsTo('App\Models\ProductCategory','FKIdTypeProduct','IdTypeProduct');
    }

    public static function storeProduct(Request $request){
        $url = null;
        if ($request->imageProduct){
            $imagen = $request->file('imageProduct')->store('public/sistema/productos');
            $url = Storage::url($imagen);
        }
        if($request->ManIva){
            $product = Product::create([
                'NameProduct' => $request->NameProduct,
                'Reference' => $request->Reference,
                'ManIva' => $request->ManIva,
                'PorIva' => $request->PorIva,
                'PorDesc' => $request->PorDesc,
                'Price' => $request->Price,
                'StatusProduct' => $request->StatusProduct,
                'Description' => $request->Description,
                'imageProduct' => $url,
                'FKIdTypeProduct' => $request->FKIdTypeProduct,
                'FKIdUser' => $request->FKIdUser,
            ]);
        }else{
            $product = Product::create([
                'NameProduct' => $request->NameProduct,
                'Reference' => $request->Reference,
                'PorIva' => 0,
                'PorDesc' => $request->PorDesc,
                'Price' => $request->Price,
                'StatusProduct' => $request->StatusProduct,
                'Description' => $request->Description,
                'imageProduct' => $url,
                'FKIdTypeProduct' => $request->FKIdTypeProduct,
                'FKIdUser' => $request->FKIdUser,
            ]);
        }
    }

    public static function updateProduc(Request $request, $id){
        // con este if se valida cuando una imagen ya este cargada y no se elija otra no borre la que estaba antes
        if($request->imageold){
            $url = $request->imageold;
        }else{
            $url = null;
        }
        if ($request->imageProduct && $url = null){
            $imagen = $request->file('imageProduct')->store('public/sistema/productos');
            $url = Storage::url($imagen);
        }
        if($request->ManIva){
            $product = Product::find($id)->update([
                'NameProduct' => $request->NameProduct,
                'Reference' => $request->Reference,
                'ManIva' => $request->ManIva,
                'PorIva' => $request->PorIva,
                'PorDesc' => $request->PorDesc,
                'Price' => $request->Price,
                'StatusProduct' => $request->StatusProduct,
                'Description' => $request->Description,
                'imageProduct' => $url,
                'FKIdTypeProduct' => $request->FKIdTypeProduct,
                'FKIdUser' => $request->FKIdUser,
            ]);
        }else{
            $product = Product::find($id)->update([
                'NameProduct' => $request->NameProduct,
                'Reference' => $request->Reference,
                'ManIva' => 0,
                'PorIva' => 0,
                'PorDesc' => $request->PorDesc,
                'Price' => $request->Price,
                'StatusProduct' => $request->StatusProduct,
                'Description' => $request->Description,
                'imageProduct' => $url,
                'FKIdTypeProduct' => $request->FKIdTypeProduct,
                'FKIdUser' => $request->FKIdUser,
            ]);
        }
    }
}
