<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidad extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = 'unidades';

    public function marca( ){
        return $this->belongsTo( Marca::class, 'marca_id', 'id');
        //return $this->hasOne(Marca::class);
    }

    public function tipo( ){
        return $this->belongsTo( Tipo::class,  'tipo_id','id');
        //return $this->hasOne(Tipo::class);
    }
}
