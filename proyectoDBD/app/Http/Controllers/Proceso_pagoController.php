<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proceso_pago;
use App\Models\Metodo_de_pago;

class Proceso_pagoController extends Controller
{
    /**
     * Se muestra una lista con los elementos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proceso_pago = Proceso_pago::all()->where('delete',false);
        if($proceso_pago != NULL){
            return response()->json($proceso_pago);
        }
        return response()->json([
            "message"=>"No se encontró comprobante",
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
        $proceso_pago = new Proceso_pago();
        $validatedData = $request->validate([
            'tipoPago' => ['require' , 'min:0' ],
            'costeTotal' => ['require', 'min:0'],
            'fechaPago' => ['require'],
            'delete' => ['require' , 'boolean'],
            'id_metodo_de_pagos' => ['require' , 'numeric']
        ]);

        //Se verifican que las llaves foraneas del elemento a guardar exitan como tal
        $metodo_de_pago = Metodo_de_pago::find($request->id_metodo_de_pagos);
        if($metodo_de_pago == NULL){
            return response()->json([
                'message'=>'No existe metodo de pago con esa id'
        }

        //Se guarda el nuevo elemento
        $proceso_pago->calle = $request->calle;
        $proceso_pago->numero = $request->numero;
        $proceso_pago->es_departamento = $request->es_departamento;
        $proceso_pago->delete = $request->delete;
        //$proceso_pago->delete = "false";

        return response()->json([
            "message"=>"Se ha creado un nuevo Proceso de Despacho",
            "id" => $proceso_pago->id
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
        $proceso_pago = Proceso_pago::find($id);
        if($proceso_pago == NULL or $proceso_pago->delete == true){
            return response()->json([
                'message'=>'No se encontro una proceso de pago'
            ]);
        }
        return response()->json($proceso_pago);
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
        if($request->tipoPago != NULL){
            $proceso_despacho->tipoPago = $request->tipoPago;
        }
        if($request->costeTotal != NULL){
            $proceso_despacho->costeTotal = $request->costeTotal;
        }
        if($request->fechaPago != NULL){
            $proceso_despacho->fechaPago = $request->fechaPago;
        }
        if($request->delete != NULL){
            $proceso_despacho->delete = $request->delete;
        $proceso_despacho->save();
        return response()->jason($proceso_despacho);
    }

    /**
     * Elimina el recurso especificado de la Base de Datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proceso_pago = Proceso_pago::find($id);
        if($proceso_pago != NULL){
           $proceso_pago->delete = true; 
           $proceso_pago->save();
        }
        else{
            "message" => "id inexistente"
        }
        return response()->json($proceso_pago);
    }
}
