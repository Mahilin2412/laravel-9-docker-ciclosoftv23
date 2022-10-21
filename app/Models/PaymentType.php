<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='PaymentTypes';
    protected $primaryKey='IdPaymentType';
    protected $fillable=[
        'NamePayment', 'Status'
    ];
}
