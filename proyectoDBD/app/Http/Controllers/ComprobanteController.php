<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobante = Comprobante::all()->where('delete',false);
        if($comprobante != NULL){
            return response()->json($comprobante);
        }
        return response()->json([
            "message"=>"No se encontró comprobante",
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
            'tipo' => ['required'],
            'id_users' => ['required'],
        ]);
        if(!is_integer($request->id_users)){
            return response()->json([
                "message"=>"La id_users debe ser un valor entero",
            ]);
        }
        }
        $comprobante = new Comprobante();
        $comprobante->tipo = $request->tipo;
        $comprobante->id_users = $request->id_users;
        $comprobante->delete = false;
        $comprobante->save();
        return response()->json([
            "message"=>"Se ha creado comprobante",
            "id"=>$comprobante->id
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
        $comprobante = Comprobante::find($id);
        if($comprobante != NULL && $comprobante->delete == false){
            return response()->json($comprobante);
        }
        return response()->json([
            "message"=>"No se encontró comprobante"
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
        if($comprobante!=NULL){
            if($request->tipo!=NULL){
                $comprobante->tipo = $request->tipo;
            }
            if($request->id_users!=NULL){
                $comprobante->id_users = $request->id_users;
            }
            if($request->delete!=NULL){
                $comprobante->delete = $request->delete;
            }
        }
        return response()->json([
            "message"=>"No se encontró comprobante"
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
        $comprobante = Comprobante::find($id);
        if($comprobante != NULL){
            $comprobante->delete = true;
            $comprobante->save();
            return response()->json([
                "message"=> "SoftDelete a comprobante",
                "id"=>$comprobante->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el comprobante"
        ],404);
    }
}
