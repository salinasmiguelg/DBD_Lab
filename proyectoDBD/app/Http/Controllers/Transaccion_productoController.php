<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion_producto;
use App\Models\Transaccion;
use App\Models\Producto;
use App\Models\Transaccion_user;
use App\Models\User;
use App\Models\Comuna;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;


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
            'id_transaccions' => ['required'],
            'id_productos' => ['required'],
        ]);
        /*
        $producto = Producto::find($request->id_productos);
        if($producto  == NULL){
            return response()->json([
                "message"=>"No se encontró producto",
                "id"=>$producto->id,
            ],404);
        }
        $transaccion = Transaccion::find($request->id_transaccions);
        if($transaccion  == NULL){
            return response()->json([
                "message"=>"No se encontró método de transacción",
                "id"=>$transaccion->id,
            ],404);
        }*/
        $transaccion_producto = new Transaccion_producto();
        $transaccion_producto->id_productos = (int)$request->id_productos;

        $id = $request->id_transaccions;
/*
        $transaccion_user = DB::table('users')
            ->join('transaccion_users','transaccion_user.id_user','=','users.id')
            ->where('users.id',$id)
            ->where('delete',false)
            ->get();*/
        $user = User::find($id);
        $producto = Producto::all()->where('delete',false)->where('stock','>',0);
        $producto1 = Producto::all()->where('delete',false)->where('stock','>',0);
        $comuna = Comuna::all()->where('delete',false);
        $rol_user = Rol::all()->where('id_users',$id)->where('delete',false);
        $idR = 0;
        foreach($rol_user as $rol_user){
            if($rol_user->nombre == "Vendedor"){
                $idR = $rol_user->id_users;
            }
        }
        $rol = Rol::find($idR);
        if((int)$request->max < $request->cantidad){
            echo '<div class="alert alert-danger">Coloque un stock que no pase el maximo disponible</div>';
            return view('home',compact('user','producto','comuna','producto1','rol'));
        }
        if(0 >= $request->cantidad){
            echo '<div class="alert alert-danger">no puede agregar cantidad negativa ni 0 de algún producto</div>';
            return view('home',compact('user','producto','comuna','producto1','rol'));
        }
        $transaccion_user = Transaccion_user::all()->where('id_users',$id)->where('delete',false);
        foreach($transaccion_user as $transaccion_user){
            $transaccion_producto->id_transaccions = $transaccion_user->id_transaccions;
        }
        $transaccion_producto->cantidad = (int)$request->cantidad;
        $transaccion_producto->delete = false;
        $transaccion_producto->save();

        return view('home',compact('user','producto','comuna','producto1','rol'));
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
                $producto = Producto::find($request->id_productos);
                if($producto != NULL){
                    $transaccion_producto->id_productos = $request->id_productos;
                }
            }
            if($request->id_transaccions!=NULL){
                $transaccion = Transaccion::find($request->id_transaccions);
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
