<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feria;
use App\Models\Comuna;
class FeriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feria = Feria::all()->where('delete',false);
        if($feria != NULL){
            return response()->json($feria);
        }
        return response()->json([
            "message"=>"No se encontró feria",
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
            'descripcion' => ['required'],
            'id_comunas' => ['required'],
        ]);
        $comuna = Comuna::find($id_comunas);
        if($comuna  == NULL){
            return response()->json([
                "message"=>"No se encontró método de transacción",
                "id"=>$comuna->id,
            ],404);
        }
        $feria = new Feria();
        $feria->descripcion = $request->descripcion;
        $feria->id_comunas = $request->id_comunas;
        $feria->delete = false;
        $feria->save();
        return response()->json([
            "message"=>"Se ha creado feria",
            "id"=>$feria->id
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
        $feria = Feria::find($id);
        if($feria != NULL && $feria->delete == false){
            return response()->json($feria);
        }
        return response()->json([
            "message"=>"No se encontró feria"
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
        $feria = Feria::find($id);
        if($feria!=NULL){
            if($request->descipcion!=NULL){
                $feria->descipcion = $request->descipcion;
            }
            if($request->id_comunas!=NULL){
                $comuna = comuna::find($id_comunas);
                if($comuna != NULL){
                    $feria->id_comunas = $request->id_comunas;
                }
            }
            if($request->delete!=NULL){
                $feria->delete = $request->delete;
            }
            $feria->save();
            return response()->json($feria);
        }
        return response()->json([
            "message"=>"No se encontró feria"
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
        $feria = Feria::find($id);
        if($feria != NULL){
            $feria->delete = true;
            $feria->save();
            return response()->json([
                "message"=> "SoftDelete a feria",
                "id"=>$feria->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el feria"
        ],404);
    }
}
