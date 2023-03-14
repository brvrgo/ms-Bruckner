<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ServicioSolicitud extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'servicio_solicitudes';

    public function operador( ){
        //return $this->belongsTo( Operadores::class,  'id','unidad_id');
        return $this->hasOne( Operador::class, 'id','operador_id' );
        
    }

    public function unidad( ){
        return $this->hasOne( Unidad::class, 'id' ,'unidad_id');
        
    }

    public function servicios( ){
       return $this->hasMany(Servicio::class, 'solicitud_id', 'id');
    }

    
    public function createdBy(){
        return $this->belongsTo( User::class, 'created_by', 'id');
    }
    
}
