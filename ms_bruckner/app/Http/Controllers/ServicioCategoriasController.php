<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicioCategoria as ServicioCategorias;


class ServicioCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $code = 200;
        $data = ServicioCategorias::all();
        
        return response()->json([
            'data' => $data
        ], $code );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $row = new ServicioCategorias();
        $row->unidad_id = $request['unidad_id'];
        $row->nombre = $request['nombre'];
        $row->created_by= $request['created_by']??NULL;
        $row->save();
        $code = $row->isClean() ? 201 : 400;
        return response()->json( [], $code );
        //$$row->created_by= $request['created_by']??NULL;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $code = 200;
        $data = ServicioCategorias::find($id);
         return response()->json([
             'data' => $data
         ], $code );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = ServicioCategorias::find( $id );
        
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
        $data = ServicioCategorias::find( $id );
        $data->delete();
        return response()->json([
            'status' => 'success',
            'data' => []
        ], $code );

    }
}
