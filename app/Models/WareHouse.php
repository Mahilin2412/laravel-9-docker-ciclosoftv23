<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WareHouse extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='WareHouses';
    protected $primaryKey='IdWareHouse';
    protected $fillable=[
        'ReferenceWareHouse', 'Name', 'StatusWareHouse', 'Status','FKIdUserMan','FKIdUser'
    ];
    public function userMan(){
        return $this->belongsTo('App\Models\User','FKIdUserMan','IdUser');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','FKIdUser','IdUser');
    }
}
