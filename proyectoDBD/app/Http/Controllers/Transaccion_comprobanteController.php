<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion_comprobante;
use App\Models\Transaccion;
use App\Models\Comprobante;

class Transaccion_comprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaccion_comprobante = Transaccion_comprobante::all()->where('delete',false);
        if($transaccion_comprobante != NULL){
            return response()->json($transaccion_comprobante);
        }
        return response()->json([
            "message"=>"No se encontró transaccion_comprobante",
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
            'id_comprobantes' => ['required'],
            'id_transaccions' => ['required'],
        ]);
        $comprobante = Comprobante::find($id_comprobantes);
        if($comprobante  == NULL){
            return response()->json([
                "message"=>"No se encontró comprobante",
                "id"=>$comprobante->id,
            ],404);
        }
        $transaccion = Transaccion::find($id_transaccions);
        if($transaccion  == NULL){
            return response()->json([
                "message"=>"No se encontró método de transacción",
                "id"=>$transaccion->id,
            ],404);
        }
        $transaccion_comprobante->id_comprobantes = $request->id_comprobantes;
        $transaccion_comprobante->id_transaccions = $request->id_transaccions;
        
        $transaccion_comprobante->delete = false;
        $transaccion_comprobante->save();
        return response()->json([
            "message"=>"Se ha creado transaccion_comprobante",
            "id"=>$transaccion_comprobante->id
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
        $transaccion_comprobante = Transaccion_comprobante::find($id);
        if($transaccion_comprobante != NULL && $transaccion_comprobante->delete == false){
            return response()->json($transaccion_comprobante);
        }
        return response()->json([
            "message"=>"No se encontró transaccion_comprobante"
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
        $transaccion_comprobante = Transaccion_comprobante::find($id);
        if($transaccion_comprobante!=NULL){
            if($request->id_comprobantes!=NULL){
                $comprobante = Comprobante::find($id_comprobantes);
                if($comprobante != NULL){
                    $transaccion_comprobante->id_transaccions = $request->id_transaccions;
                }
            }
            if($request->id_transaccions!=NULL){
                $transaccion = Transaccion::find($id_transaccions);
                if($transaccion != NULL){
                    $transaccion_comprobante->id_transaccions = $request->id_transaccions;
                }
            }
            if($request->delete!=NULL){
                $transaccion_comprobante->delete = $request->delete;
            }
            $transaccion_comprobante->save();
            return response()->json($transaccion_comprobante);
        }
        return response()->json([
            "message"=>"No se encontró transaccion_comprobante"
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
        $transaccion_comprobante = Transaccion_comprobante::find($id);
        if($transaccion_comprobante != NULL){
            $transaccion_comprobante->delete = true;
            $transaccion_comprobante->save();
            return response()->json([
                "message"=> "SoftDelete a transaccion_comprobante",
                "id"=>$transaccion_comprobante->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el transaccion_comprobante"
        ],404);
    }
}
