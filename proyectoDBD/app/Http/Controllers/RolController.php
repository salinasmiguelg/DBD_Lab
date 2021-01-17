<?php

namespace App\Http\Controllers;
use App\Models\Rol;
use App\Models\User;

use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Se muestra una lista con los elementos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = Rol::all()->where('delete',false);
        if($rol != NULL){
            return response()->json($rol);
        }
        return response()->json([
            "message"=>"No se encontró rol",
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
        $rol = new Rol();
        $validatedData = $request->validate([
            'nombre' => ['require' , 'min:2' , 'max:30'],
            'delete' => ['require' , 'boolean'],
            'id_users' => ['require' , 'boolean']
        ]);

        //Se verifican que las llaves foraneas del elemento a guardar existan como tal
        $user = User::find($request->id_users);
        if($user == NULL){
            return response()->json([
                "message"=>"No existe usuario con esa id"
            ]);
            }
        
        $rol->nombre = $request->nombre;
        $rol->delete = $request->delete;

        $rol->save();
        
        return response()->json([
        "message"=>"Se ha creado un Rol",
        "id" => $rol->id
        ],202);
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Rol::find($id);
        if($rol == NULL or $rol->delete == true){
            return response()->json([
                'message'=>'No se encontro un rol'
            ]);
        }
        return response()->json($rol);
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
        $rol = Rol::find($id);
        if($request->nombre != NULL){
            $rol->nombre = $request->nombre;
        }
        if($request->delete != NULL){
            $direccion->delete = $request->delete;
        }
        $rol->save();
        return response()->json($rol);
    }

    /**
     * Elimina el recurso especificado de la Base de Datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Rol::find($id);
        if($rol != NULL){
           $rol->delete = true; 
           $rol->save();
        }
        else{
            return response()->json([
                'message'=>'id Rol inexistente'
            ]);
        }
        return response()->json([
            'message'=>'Se borró rol solicitado'
        ]);
    }
}
