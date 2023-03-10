<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'servicios';

    public function categoria( ){ 
        return $this->belongsTo( ServicioCategoria::class, 'categoria_id', 'id');
        
    }

    public function solicitud( ){ 
        return $this->belongsTo( ServicioSolicitud::class, 'solicitud_id', 'id');
        
    }

    public function createdBy(){
        return $this->belongsTo( User::class, 'created_by', 'id');
    }

  

    
    /*
    public function paso_actual( ){
        return $this->hasOne( Unidad::class, 'id' ,'unidad_id');//ultimo paso creado
        
    }

    public function pasos( ){
        return $this->hasMany( Unidad::class, 'id' ,'unidad_id');
        
    }
    */
}
