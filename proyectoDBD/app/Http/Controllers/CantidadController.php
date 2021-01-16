<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CantidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cantidad = Cantidad::all()->where('delete',false);
        if($cantidad != NULL){
            return response()->json($cantidad);
        }
        return response()->json([
            "message"=>"No se encontró cantidad",
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
            'tipoDeCantidad' => ['required'],
        ]);
        }
        $cantidad = new Cantidad();
        $cantidad->tipoDeCantidad = $request->tipoDeCantidad;
        $cantidad->delete = false;
        $cantidad->save();
        return response()->json([
            "message"=>"Se ha creado cantidad",
            "id"=>$cantidad->id
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
        $cantidad = Cantidad::find($id);
        if($cantidad != NULL && $cantidad->delete == false){
            return response()->json($cantidad);
        }
        return response()->json([
            "message"=>"No se encontró cantidad"
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
        $cantidad = Cantidad::find($id);
        if($cantidad!=NULL){
            if($request->tipoDeCantidad!=NULL){
                $cantidad->tipoDeCantidad = $request->tipoDeCantidad;
            }
            if($request->delete!=NULL){
                $cantidad->delete = $request->delete;
            }
            $cantidad->save();
            return response()->json($cantidad);
        }
        return response()->json([
            "message"=>"No se encontró cantidad"
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
        $cantidad = Cantidad::find($id);
        if($cantidad != NULL){
            $cantidad->delete = true;
            $cantidad->save();
            return response()->json([
                "message"=> "SoftDelete a cantidad",
                "id"=>$cantidad->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el cantidad"
        ],404);
    }
}
