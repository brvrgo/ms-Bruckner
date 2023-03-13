<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Operadores extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'operadores';
    
    public function unidad( ){
        return $this->hasOne( Unidad::class, 'id' ,'unidad_id');
        
    }
}
