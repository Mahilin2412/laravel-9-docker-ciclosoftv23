<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BodyEntry extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='BodyEntries';
    protected $primaryKey='NroReg';
    protected $fillable=[
        'NroReg','FKRmtEntry','CostUnit','QuanEntry', 'Subtotal' , 'FKIdWareHouse','FKIdProduct','FKIdUser'
    ];

}
#Hi