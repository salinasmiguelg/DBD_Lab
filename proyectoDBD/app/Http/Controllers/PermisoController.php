<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;
use App\Models\Rol;

class PermisoController extends Controller
{
    /**
     * Se muestra una lista con los elementos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permiso = Permiso::all()->where('delete',false);
        if($permiso != NULL){
            return response()->json($permiso);
        }
        return response()->json([
            "message"=>"No se encontró permiso",
        ],404);
    }

    /**
     * Guarda un nuevo elemento en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permiso = new Permiso();

        $validatedData = $request->validate([
            'nombre' => ['required' , 'min:2' , 'max:30'],
            'id_rols' => ['required' , 'numeric']
        ]);

        //Se verifican que las llaves foraneas del elemento a guardar existan como tal
        $rol = Rol::find($request->id_rols);
        if($rol == NULL){
            return response()->json([
                'message'=>'id Rol no existe'
            ]);
        }
        
        $permiso->nombre = $request->nombre;
        $permiso->id_rols = $request->id_rols;
        $permiso->delete = false;

        $permiso->save();

        return response()->json([
        "message"=>"Se ha creado un Permiso",
        "id" => $permiso->id
        ],202);
    }

    /**
     *  Muestra el recurso especificado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permiso = Permiso::find($id);
        if($permiso == NULL or $permiso->delete == true){
            return response()->json([
                'message'=>'No se encontro un permiso'
            ]);
        }
        return response()->json($permiso);
    }

    /**
     * Actualiza el recurso especificado en la base de Datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permiso = Permiso::find($id);
        if($request->nombre != NULL){
            $permiso->nombre = $request->nombre;
        }
        if($request->delete != NULL){
            $permiso->delete = $request->delete;
        }
        $permiso->save();
        return response()->json($permiso);
    }

    /**
     * Elimina el recurso especificado de la Base de Datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permiso = Permiso::find($id);
        if($permiso != NULL){
           $permiso->delete = true; 
           $permiso->save();
        }
        else{
            return response()->json([
                'message'=>'id permiso no existe'
            ]);
        }
        return response()->json([
            'message'=>'Se borró permiso solicitado'
        ]);
    }
}
