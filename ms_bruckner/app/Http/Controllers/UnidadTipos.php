<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UnidadTipo as UnidadTipo;

class UnidadTipos extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Funcion para listar todos los datos de la tabla
    public function index(){
        $code = 200;
        $data = UnidadTipo::all();
        return response()->json( $data, $code );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ){

        $request->validate([
            'nombre' => ['required', "unique:App\Models\UnidadTipo,nombre"],
        ]);

        $row = new UnidadTipo();
        //$row->created_by = $request->user()->id;
        $row->nombre = $request['nombre'];

        $row->save();
        $code = $row->isClean() ? 201 : 400;
        return response()->json( [], $code );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $code = 200;
        $data = UnidadTipo::find( $id );
        return response()->json( $data, $code );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){


        $request->validate([
            'nombre' => ['required', "unique:App\Models\UnidadTipo,nombre,$id"],
        ]);

        $row = UnidadTipo::find( $id );
        //$row->created_by = $request->user()->id;
        $row->nombre = $request['nombre'];

        $row->save();
        $code = $row->isClean() ? 201 : 400;
        return response()->json( [], $code );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $code = 200;
        $data = UnidadTipo::find( $id );
        $data->delete();
        return response()->json( [], $code );
    }
}
