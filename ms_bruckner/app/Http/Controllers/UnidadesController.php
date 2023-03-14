<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Unidad as Unidad;
use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest {
    public function rules() {
        return [
            'economico' => ['required','unique:App\Models\Unidad,economico'],
            'tipo_id'=> ['required'],
            'marca_id'=> ['required'],
            'placa'=> ['required','unique:App\Models\Unidad,placa'],
            'serie'=> ['required'],
            'modelo'=>['required']

        ];
    }
    public function messages() {
        return [

            'economico.unique'=>'El valor del Número Económico ya está registrado',
            'economico.required'=>'Se debe definir el Número Económico de la Unidad',
            'tipo_id.required'=>'Se debe definir el tipo de Unidad',
            'marca_id.required'=>'Se debe definir la marca de la Unidad',
            'placa.required'=>'Se debe definir la placa de la  Unidad',
            'placa.unique'=>'El valor de la placa ya está registrada en otra Unidad',
            'serie.required'=>'Se debe definir la placa de la  Unidad',
            'modelo.required'=>'Se debe definir el modelo Unidad',
        ];
    }
    }
    
    class UpdateRequest extends ApiRequest {
        public function rules() {
            return [
                'economico' => ['required'],
                'tipo_id'=> ['required'],
                'marca_id'=> ['required'],
                'placa'=> ['required','unique:App\Models\Unidad,placa'],
                'serie'=> ['required'],
                'placa'=>['required'],
                'modelo'=>['required']
            ];
        }
        public function messages() {
            return [
              
    
                //'economico.unique'=>'El valor del Número Económico ya está registrado',
                'economico.required'=>'Se debe definir el Número Económico de la Unidad',
                'tipo_id.required'=>'Se debe definir el tipo de Unidad',
                'marca_id.required'=>'Se debe definir la marca de la Unidad',
                'placa_id.required'=>'Se debe definir la placa de la  Unidad',
                'placa_id.unique'=>'El valor de la placa ya está registrada en otra Unidad',
                'serie.required'=>'Se debe definir la placa de la  Unidad',
                'modelo.required'=>'Se debe definir el modelo Unidad',
            ];
        }
    }

    
class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code = 200;
        $data = Unidad::with([
            'tipo:id,nombre',
            'marca:id,nombre',
            'createdBy'
           /* 'servicios'=>[
                'categoria:id,nombre'
            ],
            'operador'*/
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
      

        $row = new Unidad();
        $row->economico = $request['economico'];
        $row->anio = $request['anio'];
        $row->tipo_id = $request['tipo_id'];
        $row->marca_id = $request['marca_id'];
        $row->modelo = $request['modelo'];
        $row->serie = $request['serie'];
        $row->placa = $request['placa'];
        $row->created_by= $request['created_by']??NULL;
     

        $row->save();
        $code = $row->isClean() ? 201 : 400;
        return response()->json( [], $code );
       
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {   
        
        $code = 200;
        //Obtención de los datos de la Unidad
       $data = Unidad::with([
            'tipo:id,nombre',
            'marca:id,nombre',
            'createdBy'
           /* 'servicios'=>[
                'categoria:id,nombre'
            ],
            'operador'
            */
        ])
        ->find($id);

        //Obtención de los servicios de la unidad
      //  $servicios=$data->servicios()->get();

        /*Respuesta JSON DEL API
            1)data
            2)servicios
        */
        
        return response()->json([
            'data' => $data,
           
        ], $code );
        
        
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(UpdateRequest $request, string $id)
    {   
      
        
        $row = Unidad::find( $id );
        
        $row->economico = $request['economico'];
        $row->anio = $request['anio'];
        $row->tipo_id = $request['tipo_id'];
        $row->marca_id = $request['marca_id'];
        $row->modelo = $request['modelo'];
        $row->serie = $request['serie'];
        $row->placa = $request['placa'];

      

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
        $data = Unidad::find( $id );
        $data->delete();
        return response()->json([
            'status' => 'success',
            'data' => []
        ], $code );
    }
}
