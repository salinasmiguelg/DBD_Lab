<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proceso_compra;
use App\Models\Proceso_pago;
use App\Models\Proceso_despacho;
use App\Models\Comprobante;

class Proceso_compraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proceso_compra = Proceso_compra::all()->where('delete',false);
        if($proceso_compra != NULL){
            return response()->json($proceso_compra);
        }
        return response()->json([
            "message"=>"No se encontró proceso_compra",
        ],404);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fechaPago' => ['required'],
            'pagoRealizado' => ['required'],
            'id_proceso_pagos' => ['required'],
            'id_comprobantes' => ['required'],
            'id_proceso_despachos' => ['required'],
        ]);
        $comprobante = Comprobante::find($request->id_comprobantes);
        if($comprobante  == NULL){
            return response()->json([
                "message"=>"No se encontró comprobante",
                "id"=>$comprobante->id,
            ],404);
        }
        $proceso_pago = Proceso_pago::find($request->id_proceso_pagos);
        if($proceso_pago  == NULL){
            return response()->json([
                "message"=>"No se encontró método de transacción",
                "id"=>$proceso_pago->id,
            ],404);
        }
        $proceso_despacho = Proceso_despacho::find($request->id_proceso_despachos);
        if($proceso_despacho  == NULL){
            return response()->json([
                "message"=>"No se encontró método de transacción",
                "id"=>$proceso_despacho->id,
            ],404);
        }
        $proceso_compra = new Proceso_compra();
        $proceso_compra->id_comprobantes = $request->id_comprobantes;
        $proceso_compra->fechaPago = $request->fechaPago;
        $proceso_compra->pagoRealizado = $request->pagoRealizado;
        $proceso_compra->id_proceso_despachos = $request->id_proceso_despachos;
        $proceso_compra->id_proceso_pagos = $request->id_proceso_pagos;
        
        $proceso_compra->delete = false;
        $proceso_compra->save();
        return response()->json([
            "message"=>"Se ha creado proceso_compra",
            "id"=>$proceso_compra->id
        ],202);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proceso_compra = Proceso_compra::find($id);
        if($proceso_compra != NULL && $proceso_compra->delete == false){
            return response()->json($proceso_compra);
        }
        return response()->json([
            "message"=>"No se encontró proceso_compra"
        ],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proceso_compra = Proceso_compra::find($id);
        if($proceso_compra!=NULL){
            if($request->id_comprobantes!=NULL){
                $comprobante = Comprobante::find($request->id_comprobantes);
                if($comprobante != NULL){
                    $proceso_compra->id_comprobantes = $request->id_comprobantes;
                }
            }
            if($request->id_proceso_pagos!=NULL){
                $proceso_pago = Proceso_pago::find($request->id_proceso_pagos);
                if($proceso_pago != NULL){
                    $proceso_compra->id_proceso_pagos = $request->id_proceso_pagos;
                }
            }
            if($request->id_proceso_despachos!=NULL){
                $proceso_despacho = Proceso_despacho::find($request->id_proceso_despachos);
                if($proceso_despacho != NULL){
                    $proceso_compra->id_proceso_despachos = $request->id_proceso_despachos;
                }
            }
            if($request->fechaPago!=NULL){
                $proceso_compra->fechaPago = $request->fechaPago;
            }
            if($request->pagoRealizado!=NULL){
                $proceso_compra->pagoRealizado = $request->pagoRealizado;
            }
            if($request->delete!=NULL){
                $proceso_compra->delete = $request->delete;
            }
            $proceso_compra->save();
            return response()->json($proceso_compra);
        }
        return response()->json([
            "message"=>"No se encontró proceso_compra"
        ],404);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proceso_compra = Proceso_compra::find($id);
        if($proceso_compra != NULL){
            $proceso_compra->delete = true;
            $proceso_compra->save();
            return response()->json([
                "message"=> "SoftDelete a proceso_compra",
                "id"=>$proceso_compra->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el proceso_compra"
        ],404);
    }
}
