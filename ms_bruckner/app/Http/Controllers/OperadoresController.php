<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operadores as Operador;
use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest {
    public function rules() {
        return [
            'nombre'=>['required'] 
        ];
    }
    public function messages() {
        return [
            'nombre.required' => 'El nombre es requerido',
        ];
    }
    }
    
    class UpdateRequest extends ApiRequest {
        public function rules() {
            return [
                'nombre'=>['required'] 
            ];
        }
        public function messages() {
            return [
                'nombre.required' => 'El nombre es requerido',
            ];
        }
    }

    class AsignarUnidadRequest extends ApiRequest {
        public function rules() {
            return [
                'unidad_id'=>['required'] 
            ];
        }
        public function messages() {
            return [
                'unidad_id.required' => 'La unidad es requerida',
            ];
        }
    }

    
class OperadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code = 200;
        $data = Operador::with([
           //  'unidad'
            
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
        $row = new Operador();
        $row->unidad_id = $request['unidad_id'];
        $row->nombre = $request['nombre'];
        $row->created_by= $request['created_by']??NULL;
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
        $data = Operador::with([
            // 'unidad'
            
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
        $row = Operador::find( $id );
        
        $row->unidad_id = $request['unidad_id'];
        $row->nombre = $request['nombre'];

      
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
        $data = Operador::find( $id );
        $data->delete();
        return response()->json([
            'status' => 'success',
            'data' => []
        ], $code );
    }
}
