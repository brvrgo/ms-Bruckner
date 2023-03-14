<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicioPaso as ServicioPasos;

class ServicioPasosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code = 200;
        $data = ServicioPasos::all();
        return response()->json([
            'data' => $data
        ], $code );
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $row = new ServicioPasos();
        $row->nombre = $request['nombre'];
        $row->descripcion = $request['descripcion'];
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
        //Obtención de los datos de la Unidad
       $data = ServicioPasos::find($id);

        return response()->json([
            'data' => $data
        ], $code );
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = ServicioPasos::find( $id );
        
        $row->nombre = $request['nombre'];
        $row->descripcion = $request['descripcion'];
        $row->created_by= $request['created_by']??NULL;
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
        $data = ServicioPasos::find( $id );
        $data->delete();
        return response()->json([
            'status' => 'success',
            'data' => []
        ], $code );
    }
}
