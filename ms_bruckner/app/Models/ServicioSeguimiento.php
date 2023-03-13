<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicioSeguimiento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'servicio_seguimiento';

    public function servicio( ){ 
        return $this->belongsTo( Servicio::class, 'servicio_id', 'id');
        
    }

    /* public function paso( ){
        return $this->hasOne( ServicioPaso::class, 'id' ,'paso_id');// tomar el ultimo paso
        
    } */

}
