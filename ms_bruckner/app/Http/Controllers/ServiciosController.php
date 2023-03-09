<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio as Servicio;

class ServiciosController extends Controller
{

///Falta definir la restricción para dos servicios iguales en la misma unidad

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code = 200;
        $data = Servicio::all();
        
       return response()->json( $data, $code );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $row = new Servicio();
        $row->categoria_id = $request['categoria_id'];
        $row->unidad_id = $request['unidad_id'];
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
        $data = Servicio::find( $id );
        return response()->json( $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Servicio::find( $id );
        
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