<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use App\Models\User;
use App\Models\Comuna;

class DireccionController extends Controller
{
    /**
     * Se muestra una lista con los elementos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direccion = Direccion::all()->where('delete',false);
        if($direccion != NULL){
            return response()->json($direccion);
        }
        return response()->json([
            "message"=>"No se encontró direccion",
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
        $direccion = new Direccion();
        $validatedData = $request->validate([
            'calle' => ['required' , 'min:2' , 'max:30'],
            'numero' => ['required' , 'min:0' , 'max:10000'],
            'es_departamento' => ['required' , 'boolean'],
            'id_users' => ['required' , 'numeric'],
            'id_comunas' => ['required' , 'numeric']
        ]);
        
        //Se verifican que las llaves foraneas del elemento a guardar existan como tal
        $user = User::find($request->id_users);
        if($user == NULL){
            return response()->json([
                'message'=>'id User inexistente'
            ]);
        }

        $comuna = Comuna::find($request->id_comunas);
        if($comuna == NULL){
            return response()->json([
                'message'=>'id comuna inexistente'
            ]);
        }

        //Se guardan los elementos en la nueva direccion creada
        $direccion->calle = $request->calle;
        $direccion->numero = $request->numero;
        $direccion->es_departamento = $request->es_departamento;
        $direccion->id_users = $request->id_users;
        $direccion->id_comunas = $request->id_comunas;

        $direccion->delete = false;

        $direccion->save();

        return response()->json([
            "message"=>"Se ha creado una nueva direccion",
            "id" => $direccion->id
        ],202);
    }

    /**
     * Muestra el recurso especificado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $direccion = Direccion::find($id);
        if($direccion == NULL or $direccion->delete == true){
            return response()->json([
                'message'=>'No se encontro una direccion'
            ]);
        }
        return response()->json($direccion);
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
        $direccion = Direccion::find($id);
        if($request->calle != NULL){
            $direccion->calle = $request->calle;
        }
        if($request->numero != NULL){
            $direccion->numero = $request->numero;
        }
        if($request->es_departamento != NULL){
            $direccion->es_departamento = $request->es_departamento;
        }
        if($request->delete != NULL){
            $direccion->delete = $request->delete;
        }
        $direccion->save();
        return response()->json($direccion);
    }

    /**
     * Elimina el recurso especificado de la Base de Datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direccion = Direccion::find($id);
        if($direccion != NULL){
           $direccion->delete = true; 
           $direccion->save();
        }
        else{
            return response()->jason([
                'message'=>'id Direccion no existe'
            ]);
        }
        return response()->json([
            'message'=>'Se borró direccion solicitada'
        ]);
    }
}
