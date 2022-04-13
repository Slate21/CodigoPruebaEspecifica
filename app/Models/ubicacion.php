<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ubicacion extends Model
{
    protected $table='ubicacion';
    
    protected $primaryKey='id_ubicacion';

    public $timestamps=false;

    protected $fillable =[
    	'longitud',
        'latitud'    
    ];
}
