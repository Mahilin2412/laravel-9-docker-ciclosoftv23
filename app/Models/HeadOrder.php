<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeadOrder extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='HeadOrders';
    protected $primaryKey='RmtOrder';
    protected $fillable=[
        'NumOrder', 'DateOrder', 'StatusOrder', 'Subtotal', 'TotalIva', 'TotalPrice', 'Status'
    ];
}
