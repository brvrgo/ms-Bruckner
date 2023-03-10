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

    public function unidad( ){
        return $this->hasOne( Unidad::class, 'id' ,'unidad_id');
        
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
