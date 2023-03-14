<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio as Servicio;
use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest {
public function rules() {
    return [
        'categoria_id' => ['required'],
        'unidad_id'=> ['required'] 
    ];
}
public function messages() {
    return [
        'unidad_id.required' => 'La unidad es requerida',
        'categoria_id.required' => 'Definir el servicio es requerido'
    ];
}
}

class UpdateRequest extends ApiRequest {
    public function rules() {
        return [
            'categoria_id' => ['required'],
            'unidad_id'=> ['required'] 
        ];
    }
    public function messages() {
        return [
            'unidad_id.required' => 'La unidad es requerida',
            'categoria_id.required' => 'Definir el servicio es requerido'
        ];
    }
}


class ServiciosController extends Controller
{



///Falta definir la restricción para dos servicios iguales en la misma unidad

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code = 200;
          $data = Servicio::with([
            'categoria',
            'solicitud'=>[
                'operador',
                'unidad'=>[
                    'marca',
                    'tipo'
                ]
            ] 
            
        ])
        ->get();
        
        return response()->json([
            'data' => $data
        ], $code );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        
        $row = new Servicio();
        $row->categoria_id = $request['categoria_id'];
        $row->created_by= $request['created_by']??NULL;
        $row->unidad_id = $request['unidad_id'];
        $row->solicitud_id = $request['solicitud_id'];
        $row->notas = $request['notas'];
        
     

        $row->save();
        $code = $row->isClean() ? 201 : 400;
        return response()->json( [], $code );

      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     
         $code = 200;
        $data = Servicio::with([
             'categoria:id,nombre',
             //'unidad'
            
         ])
         ->find($id);
         return response()->json([
             'data' => $data
         ], $code );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $row = Servicio::find( $id );
        
        $row->solicitud_id = $request['solicitud_id'];
        $row->categoria_id = $request['categoria_id'];
        $row->unidad_id = $request['unidad_id'];
        $row->notas = $request['notas'];

      

        $row->save();
        $code = $row->isClean() ? 201 : 400;
        return response()->json([
            'status' => 'success',
            'data' => []
        ], $code );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Servicio::find( $id );
        $data->delete();
        return response()->json([
            'status' => 'success',
            'data' => []
        ], $code );
    }
}
