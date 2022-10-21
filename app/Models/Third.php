<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Third extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='Thirds';
    protected $primaryKey='IdThird';
    protected $fillable=[
        'NumIdentification','FKIdTypeDoc','FirstNameThird', 'SecondNameThird', 'LastNameThird', 'SecondLastNameThird', 'NameComplete', 'ExistsCutomer', 'ExistsProvider', 'FKIdGender','FKIdUser'
    ];

    public function tdocu(){
        return $this->belongsTo('App\Models\DocumentType','FKIdTypeDoc','IdTypeDoc');
    }
}
