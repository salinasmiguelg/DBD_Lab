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
        //
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
