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
      //  echo "saludo";
     // print_r($request);
      //return response()->json($request);
        /*
        $request->validate([
            'nombre' => ['required', "unique:App\Models\UnidadTipo,nombre"],
        ]);

        $row = new Unidad();
        //$row->created_by = $request->user()->id;
        $row->nombre = $request['modelo'];

        $row->save();
        $code = $row->isClean() ? 201 : 400;
        return response()->json( [], $code );
        */
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
