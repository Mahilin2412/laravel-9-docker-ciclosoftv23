<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailServer extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='MailServer';
    protected $primaryKey='IdSerCorreo ';
    protected $fillable=[
        'IpServidorCorreo', 'Port'
    ];
}
