<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Transaccion_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaccion_user = Transaccion_user::all()->where('delete',false);
        if($transaccion_user != NULL){
            return response()->json($transaccion_user);
        }
        return response()->json([
            "message"=>"No se encontró transaccion_user",
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
            'id_transaccions' => ['required'],
            'id_users' => ['required'],
        ]);
        if(!is_integer($request->id_transaccions)){
            return response()->json([
                "message"=>"La id_transaccions debe ser un valor entero",
            ]);
        }
        if(!is_integer($request->id_users)){
            return response()->json([
                "message"=>"La id_users debe ser un valor entero",
            ]);
        }
        }
        $transaccion_user = new Transacciones_user();
        $transaccion_user->id_transaccions = $request->id_transaccions;
        $transaccion_user->id_users = $request->id_users;
        $transaccion_user->delete = false;
        $transaccion_user->save();
        return response()->json([
            "message"=>"Se ha creado transaccion_user",
            "id"=>$transaccion_user->id
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
        $transaccion_user = Transaccion_user::find($id);
        if($transaccion_user != NULL && $transaccion_user->delete == false){
            return response()->json($transaccion_user);
        }
        return response()->json([
            "message"=>"No se encontró transaccion_user"
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
        if($transaccion_user!=NULL){
            if($request->id_transaccions!=NULL){
                $transaccion_user->id_transaccions = $request->id_transaccions;
            }
            if($request->id_users!=NULL){
                $transaccion_user->id_users = $request->id_users;
            }
            if($request->delete!=NULL){
                $transaccion_user->delete = $request->delete;
            }
        }
        return response()->json([
            "message"=>"No se encontró transaccion_user"
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
        $transaccion_user = Transaccion_user::find($id);
        if($transaccion_user != NULL){
            $transaccion_user->delete = true;
            $transaccion_user->save();
            return response()->json([
                "message"=> "SoftDelete a transaccion_user",
                "id"=>$transaccion_user->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el transaccion_user"
        ],404);
    }
}
