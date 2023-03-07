<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnidadMarca extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = "unidad_marcas";

    public function unidades(){
        return $this->hasMany( Unidad::class, 'unidad_id', 'id' );
    }

}
