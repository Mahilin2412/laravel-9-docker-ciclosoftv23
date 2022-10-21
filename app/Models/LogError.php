<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogError extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='LogErrors';
    protected $primaryKey='IdLog';
    protected $fillable=[
        'TableOrigen', 'LevelError', 'Description'
    ];
}
