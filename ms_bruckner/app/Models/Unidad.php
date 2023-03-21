<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unidad extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = 'unidades';

    public function marca( ){
        return $this->belongsTo( UnidadMarca::class, 'marca_id', 'id');

    }

    public function tipo( ){
        return $this->belongsTo( UnidadTipo::class,  'tipo_id','id');
        
    }
/*
    public function solicitud(){
        return $this->belongsTo( ServicioSolicitud::class, 'unidad_id', 'id');
    }
    */
    public function servicioSolicitudes( ): HasMany{
        return $this->hasMany( ServicioSolicitud::class,'unidad_id','id');
        
    }


    public function actualServicioSolicitud(): HasOne
{
    return $this->hasOne(ServicioSolicitud::class)->ofMany([
        'id' => 'max',
    ], function ( $query) {
        //$query->where('published_at', '<', now());
    });
}

    public function createdBy(){
        return $this->belongsTo( User::class, 'created_by', 'id');
    }
    /*
    public function servicios( ): HasMany{
        return $this->hasMany( Servicio::class);
        
    }*/

    /*
    public function operador( ){
        return $this->belongsTo( Operadores::class,  'id','unidad_id');
        
    }
    /*

    /*
    public function serviciosAbiertos( ){
        return $this->belongsTo( UnidadTipo::class,  'tipo_id','id');
        
    }
    */
}
