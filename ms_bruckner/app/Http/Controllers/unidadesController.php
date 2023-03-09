<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Unidad as Unidad;


class UnidadesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code = 200;
        $data = Unidad::all();
        return response()->json( $data, $code );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      

        
      
        $row = new Unidad();
        $row->economico = $request['economico'];
        $row->tipo_id = $request['tipo_id'];
        $row->marca_id = $request['marca_id'];
        $row->anio = $request['anio'];
        $row->serie = $request['serie'];
        $row->placa = $request['placa'];
        $row->modelo = $request['modelo'];
     

        $row->save();
        $code = $row->isClean() ? 201 : 400;
        return response()->json( [], $code );
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Unidad::find( $id );
        return response()->json( $data );
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id)
    {   
      
        
        $row = Unidad::find( $id );
        
        $row->economico = $request['economico'];
        $row->tipo_id = $request['tipo_id'];
        $row->marca_id = $request['marca_id'];
        $row->anio = $request['anio'];
        $row->serie = $request['serie'];
        $row->placa = $request['placa'];
        $row->modelo = $request['modelo'];

      

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
