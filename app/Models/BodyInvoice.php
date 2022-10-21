<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BodyInvoice extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='BodyInvoices';
    protected $primaryKey='NroRegi';
    protected $fillable=[
        'FKRmtInvoice','NroRegi','QuaInvoice','PriceUnit', 'Subtotal', 'DiscoUnit', 'ValIva', 'TotalItem', 'Status', 'FKIdProduct', 'FKIdWareHouse'
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product','FKIdProduct','IdProduct');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\Models\WareHouse','FKIdWareHouse','IdWareHouse');
    }

}
