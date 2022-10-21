<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class HeadEntry extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='HeadEntries';
    protected $primaryKey='RmtEntry';
    protected $fillable=[
        'RmtEntry','CreationDate', 'DescriptionEntry', 'Subtotal', 'CostIVA','TotalCost', 'Status', 'FKIdProvider','FKIdUser'
    ];

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider','FKIdProvider','IdProvider');
    }

    public static function maxentry(){
        $max = HeadEntry::max('RmtEntry');
        return $max + 1;
    }

    public static function storeEntry(Request $request){
    }
    public static function getprice($product){
        $product = Product::find($product);
        if($product){
            return $product->Price;
        }else{
            return 0;
        }

    }
    public static function TotalPrice($products, $Quantities){
        $precio = 0;
        foreach ($products as $key => $value) {
            $producto = Product::find($value);
            $precio += ($producto->Price * $Quantities[$key]);
        }
        return $precio;
    }
}
