<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informacion_usuario extends Model
{
    protected $table='informacion_usuario';
    
    protected $primaryKey='id_Usuario';

    public $timestamps=false;

    protected $fillable =[
    	'nombre',
        'apellido',
        'tipo_documento',
        'numero_documento',
        'Numero_localizacion'    
    ];
    
    protected $guarded =[
        
    ];
}
