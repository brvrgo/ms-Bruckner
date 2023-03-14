<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicioSolicitud as ServicioSolicitud;
use App\Models\Servicio as Servicio;
use Illuminate\Support\Facades\DB;


class ServicioSolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code = 200;
        $data = ServicioSolicitud::with([
             'unidad',
             'operador',
             'servicios'
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
        $row = new ServicioSolicitud();

            DB::transaction( function() use ($row, $request) {
            $row->operador_id = $request['operador_id'];
            $row->unidad_id = $request['unidad_id'];
            $row->created_by= $request['created_by']??NULL;
            $row->save();

            if( isset($request['servicios']) && is_iterable($request['servicios']) ){
    
                foreach(  $request['servicios'] as $servicio ){                
                    $servicioRow = new Servicio();
                    $servicioRow->categoria_id = $servicio['categoria_id'];
                    $servicioRow->solicitud_id = $row->id;
                    $servicioRow->created_by= $request['created_by'];
                    $servicioRow->notas= $servicio['notas'];
                    $servicioRow->save();
                }
            }
              
        });

        $code = $row->isClean() ? 201 : 400;
        return response()->json( [], $code );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $code = 200;
        $data = ServicioSolicitud::with([
             'unidad',
             'operador',
             'servicios'
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
        $row = ServicioSolicitud::find( $id );

        $row->operador_id = $request['operador_id'];
        $row->unidad_id = $request['unidad_id'];
      
        $row->save();
        $code = $row->isClean() ? 201 : 400;
        return response()->json( [], $code );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ServicioSolicitud::find( $id );
        $data->delete();
        return response()->json([
            'status' => 'success',
            'data' => []
        ], $code );
    }
}
