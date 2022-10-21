<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class HeadInvoice extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='HeadInvoices';
    protected $primaryKey='RmtInvoice';
    protected $fillable=[
        'NumberInvoice', 'DateInvoice', 'TotalIva', 'Subtotal', 'TotalPrice', 'FKIdCustomer', 'FKIdPaymentType'
    ];
        //Factura
        public function customer()
        {
            return $this->belongsTo('App\Models\Customer','FKIdCustomer','IdCustomer');
        }

        public function paymenttype()
        {
            return $this->belongsTo('App\Models\PaymentType','FKIdPaymentType','IdPaymentType');
        }

        //facturadetalle

        /*public static function queryA($id = 1){
        $bi = BodyInvoice::find($id);
        $hi = HeadInvoice::find($bi->FKRmtInvoice);
        $p = Product::find($bi->FKIdProduct);
        $w = WareHouse::find($bi->FKIdWareHouse);

        return response()->json([
            'head_invoice' => $hi,
            'body_invoice' => $bi,
            'product' => $p,
            'warehouse' => $w
        ]);*/

        public static function invoiceDetail($id)
        {
            $hi = HeadInvoice::find($id);
            $bi = BodyInvoice::get();//::where('FKRmtInvoice',' = ',2)->get();
            $bi = $bi->where('FKRmtInvoice',' = ',$hi->RmtInvoice);
            $p = Product::find($bi->FKIdProduct);
            $c = Customer::find($hi->FKIdCustomer);
            $mp = PaymentType::find($hi->FKIdPaymentType);


            return response()->json([
                'head_invoice' => $hi,
                'body_invoice' => $bi,
                'customer' => $c,
                'paymment' => $mp,
                'products' => $p
            ]);

        }
    public static function maxinvoice(){
        $max = HeadInvoice::max('RmtInvoice');
        return $max + 1;
    }
    public static function getprice($product){
        $product = Product::find($product);
        if($product){
            return $product->Price;
        }else{
            return 0;
        }
    }
    public static function getCustomer($customer){
        $customer = Customer::find($customer);
        if($customer){
            return $customer->mail;
        }else{
            return " ";
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
