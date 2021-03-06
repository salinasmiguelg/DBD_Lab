<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proceso_despacho;
use App\Models\Direccion;

class Proceso_despachoController extends Controller
{
    /**
     * Se muestra una lista con los elementos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proceso_despacho = Proceso_despacho::all()->where('delete',false);
        if($proceso_despacho != NULL){
            return response()->json($proceso_despacho);
        }
        return response()->json([
            "message"=>"No se encontró el proceso de despacho correspondiente",
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
        $proceso_despacho = new Proceso_despacho();
        $validatedData = $request->validate([
            'tipo_despacho' => ['required' , 'min:2' , 'max:30'],
            'fecha_despacho' => ['required'],
            'elementos_despachados' => ['required' , "min:1"],
            'coste_despacho' => ['required' , "min:1"],
            'id_direccions' => ['required' , "numeric"],
        ]);

        //Se verifican que las llaves foraneas del elemento a guardar existan como tal
        $direccion = Direccion::find($request->id_direccions);
        if($direccion == NULL){
            return response()->json([
                'message'=>'No existe direccion con esa id'
            ]);
        }
        
        $proceso_despacho->tipo_despacho = $request->tipo_despacho;
        $proceso_despacho->fecha_despacho = $request->fecha_despacho;
        $proceso_despacho->elementos_despachados = $request->elementos_despachados;
        $proceso_despacho->coste_despacho = $request->coste_despacho;
        $proceso_despacho->id_direccions = $request->id_direccions;
        $proceso_despacho->delete = false;

        $proceso_despacho->save();

        return response()->json([
            "message"=>"Se ha creado un nuevo Proceso de Despacho",
            "id" => $proceso_despacho->id
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
        $proceso_despacho = Proceso_despacho::find($id);
        if($proceso_despacho == NULL or $proceso_despacho->delete == true){
            return response()->json([
                'message'=>'No se encontro un proceso de despacho'
            ]);
        }
        return response()->json($proceso_despacho);
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
        $proceso_despacho = Proceso_despacho::find($id);
        if($request->tipo_despacho != NULL){
            $proceso_despacho->tipo_despacho = $request->tipo_despacho;
        }
        if($request->fecha_despacho != NULL){
            $proceso_despacho->fecha_despacho = $request->fecha_despacho;
        }
        if($request->elementos_despachados != NULL){
            $proceso_despacho->elementos_despachados = $request->elementos_despachados;
        }
        if($request->coste_despacho != NULL){
            $proceso_despacho->coste_despacho = $request->coste_despacho;
        }
        if($request->delete != NULL){
            $proceso_despacho->delete = $request->delete;
        }
        $proceso_despacho->save();
        return response()->json($proceso_despacho);
    }

    /**
     * Elimina el recurso especificado de la Base de Datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proceso_despacho = Proceso_despacho::find($id);
        if($proceso_despacho != NULL){
           $proceso_despacho->delete = true; 
           $proceso_despacho->save();
        }
        else{
            return response()->json([
                'message'=>'Id proceso de despacho no existe'
            ]);
        }
        return response()->json([
            'message'=>'Se borró rol proceso de despacho'
        ]);
    }
}
