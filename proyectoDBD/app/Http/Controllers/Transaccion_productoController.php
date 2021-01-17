<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion_producto;
use App\Models\Transaccion;
use App\Models\Producto;


class Transaccion_productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaccion_producto = Transaccion_producto::all()->where('delete',false);
        if($transaccion_producto != NULL){
            return response()->json($transaccion_producto);
        }
        return response()->json([
            "message"=>"No se encontró transaccion_producto",
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
            'id_productos' => ['required'],
        ]);
        $comprobante = Comprobante::find($id_comprobantes);
        if($comprobante  == NULL){
            return response()->json([
                "message"=>"No se encontró comprobante",
                "id"=>$comprobante->id,
            ],404);
        }
        $producto = Producto::find($id_productos);
        if($transaccion  == NULL){
            return response()->json([
                "message"=>"No se encontró método de transacción",
                "id"=>$transaccion->id,
            ],404);
        }
        $transaccion_producto->id_productos = $request->id_productos;
        $transaccion_producto->id_transaccions = $request->id_transaccions;
        
        $transaccion_producto->delete = false;
        $transaccion_producto->save();
        return response()->json([
            "message"=>"Se ha creado transaccion_producto",
            "id"=>$transaccion_producto->id
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
        $transaccion_producto = Transaccion_producto::find($id);
        if($transaccion_producto != NULL && $transaccion_producto->delete == false){
            return response()->json($transaccion_producto);
        }
        return response()->json([
            "message"=>"No se encontró transaccion_producto"
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
        $transaccion_producto = Transaccion_producto::find($id);
        if($transaccion_producto!=NULL){
            if($request->id_productos!=NULL){
                $producto = Producto::find($id_productos);
                if($producto != NULL){
                    $transaccion_producto->id_transaccions = $request->id_transaccions;
                }
            }
            if($request->id_transaccions!=NULL){
                $transaccion = Transaccion::find($id_transaccions);
                if($transaccion != NULL){
                    $transaccion_producto->id_transaccions = $request->id_transaccions;
                }
            }
            if($request->delete!=NULL){
                $transaccion_producto->delete = $request->delete;
            }
            $transaccion_producto->save();
            return response()->json($transaccion_producto);
        }
        return response()->json([
            "message"=>"No se encontró transaccion_producto"
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
        $transaccion_producto = Transaccion_producto::find($id);
        if($transaccion_producto != NULL){
            $transaccion_producto->delete = true;
            $transaccion_producto->save();
            return response()->json([
                "message"=> "SoftDelete a transaccion_producto",
                "id"=>$transaccion_producto->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el transaccion_producto"
        ],404);
    }
}
