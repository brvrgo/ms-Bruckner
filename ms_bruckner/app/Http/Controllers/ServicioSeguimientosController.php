<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ApiRequest;

use App\Models\ServicioSeguimiento as ServicioSeguimiento;

class ServicioSeguimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code = 200;
        $data = ServicioSeguimiento::with([
            'servicio',
            //'paso_actual'
        ])
        ->get();

        return response()->json([
            'data' => $data
        ], $code );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $row = new ServicioSeguimiento();
        $row->servicio_id = $request['servicio_id'];
        $row->paso_id = $request['paso_id'];
        $row->notas = $request['notas'];
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
        $data = ServicioSeguimiento::with([
            'servicio',
            //'paso_actual'
        ])
        ->find($id);

        return response()->json([
            'data' => $data
        ], $code );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row =ServicioSeguimiento::find( $id );
        $row->servicio_id = $request['servicio_id'];
        $row->paso_id = $request['paso_id'];
        $row->notas = $request['notas'];
        $row->created_by= $request['created_by']??NULL;
        $row->save();
        $code = $row->isClean() ? 201 : 400;
        return response()->json( [], $code );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ServicioSeguimiento::find( $id );
        $data->delete();
        return response()->json([
            'status' => 'success',
            'data' => []
        ], $code );
    }
}
