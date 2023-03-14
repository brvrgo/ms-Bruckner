<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ApiRequest;

use App\Models\UnidadMarca as UnidadMarca;

class StoreRequest extends ApiRequest {
    public function rules() {
        return [
            'nombre' => ['required', "unique:App\Models\UnidadTipo,nombre"],
        ];
    }
    public function messages() {
        return [
            'nombre.unique' => 'El nombre ya está registrado',
            'nombre.required' => 'El nombre es requerido'
        ];
    }
}

class UpdateRequest extends ApiRequest {
    public function rules() {
        return [
            'nombre' => ['required', "unique:App\Models\UnidadTipo,nombre"],
        ];
    }
    public function messages() {
        return [
            'nombre.unique' => 'El nombre ya está registrado',
            'nombre.required' => 'El nombre es requerido'
        ];
    }
}


class UnidadMarcasController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Funcion para listar todos los datos de la tabla
    public function index(){
        $code = 200;
        $data = UnidadMarca::all();
        return response()->json([
            'data' => $data
        ], $code );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ){

        $request->validate([
            'nombre' => ['required', "unique:App\Models\Area,nombre"],
            'descripcion' => ['required'],
        ]);

        $row = new UnidadTipo();
        $row->created_by = $request->user()->id;
        $row->nombre = $request['nombre'];
        $row->descripcion = $request['descripcion'];
        $row->created_by= $request['created_by'];

        $row->save();

        if( $row->isClean() ){

            session()->flash(
                'flash', [
                    'status' => "success",
                    'message' => "Registro creado correctamente"
                ]
            );

            return redirect('/areas');

        } else {
            session()->flash(
                'flash', [
                    'status' => "error",
                    'message' => "datos incorrectos"
                ]
            );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = UnidadTipo::find( $id );
        return response()->json( $data );
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
            'nombre' => ['required', "unique:App\Models\Planta,nombre,$id"],
            'descripcion' => ['required'],
        ]);
        $row = UnidadTipo::find( $id );
        $row->updated_by = $request->user()->id;
        $row->nombre = $request['nombre'];
        $row->descripcion = $request['descripcion'];

        $row->save();

        if( $row->isClean() ){

            session()->flash(
                'flash', [
                    'status' => "success",
                    'message' => "Registro creado correctamente"
                ]
            );

            return redirect('/areas');

        } else {
            session()->flash(
                'flash', [
                    'status' => "error",
                    'message' => "datos incorrectos"
                ]
            );
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = UnidadTipo::find( $id );
        $data->delete();
    }
}
