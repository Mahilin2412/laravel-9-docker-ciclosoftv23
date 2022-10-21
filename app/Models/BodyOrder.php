<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BodyOrder extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='BodyOrders';
    protected $primaryKey='NroRegi';
    protected $fillable=[
        'QuanOrder','PriceUnit', 'Subtotal', 'Discount', 'ValIva', 'TotalPrice'
        ];
}
