<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='ProductCategories';
    protected $primaryKey='IdTypeProduct';
    protected $fillable=[
        'ReferenceType', 'NameCategory', 'FKIdUser'
    ];

    public function users(){
        return $this->belongsTo('App\Models\User','FKIdUser','IdUser');
    }
}
