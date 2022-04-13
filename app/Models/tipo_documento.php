<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_documento extends Model
{
    protected $table='tipo_documento';
    
    protected $primaryKey='id_tipoDocumento';

    public $timestamps=false;

    protected $fillable =[
    	'TDocumento'    
    ];
    
}
