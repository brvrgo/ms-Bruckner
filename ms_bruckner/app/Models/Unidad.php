<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    
    public function servicios( ): HasMany{
        return $this->hasMany( Servicio::class);
        
    }

    public function operador( ){
        return $this->belongsTo( Operadores::class,  'id','unidad_id');
        
    }

    /*
    public function serviciosAbiertos( ){
        return $this->belongsTo( UnidadTipo::class,  'tipo_id','id');
        
    }
    */
}
