<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaccion = Transaccion::all()->where('delete',false);
        if($transaccion != NULL){
            return response()->json($transaccion);
        }
        return response()->json([
            "message"=>"No se encontró transaccion",
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
            'monto' => ['required'],
            'tipoDeCantidad' => ['required'],
        ]);
        if(!is_integer($request->monto)){
            return response()->json([
                "message"=>"El monto debe ser un valor entero",
            ]);
        }
        $transaccion = new Transaccion();
        $transaccion->monto = $request->monto;
        $transaccion->fechaPago = $request->fechaPago;
        $transaccion->delete = false;
        $transaccion->save();
        return response()->json([
            "message"=>"Se ha creado transaccion",
            "id"=>$transaccion->id
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
        $transaccion = Transaccion::find($id);
        if($transaccion != NULL && $transaccion->delete == false){
            return response()->json($transaccion);
        }
        return response()->json([
            "message"=>"No se encontró transaccion"
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
        $transaccion = Transaccion::find($id);
        if($transaccion!=NULL){
            if($request->monto!=NULL){
                $transaccion->monto = $request->monto;
            }
            if($request->fechaPago!=NULL){
                $transaccion->fechaPago = $request->fechaPago;
            }
            if($request->delete!=NULL){
                $transaccion->delete = $request->delete;
            }
            $transaccion->save();
            return response()->json($transaccion);
        }
        return response()->json([
            "message"=>"No se encontró transaccion"
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
        $transaccion = Transaccion::find($id);
        if($transaccion != NULL){
            $transaccion->delete = true;
            $transaccion->save();
            return response()->json([
                "message"=> "SoftDelete a transaccion",
                "id"=>$transaccion->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el transaccion"
        ],404);
    }
}
