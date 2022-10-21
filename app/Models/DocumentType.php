<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='DocumentTypes';
    protected $primaryKey='IdTypeDoc';
    protected $fillable=[
        'NameTypeDoc','AcroTypeDoc'
    ];
}
