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
        //$row->created_by= $request['created_by']??NULL;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
