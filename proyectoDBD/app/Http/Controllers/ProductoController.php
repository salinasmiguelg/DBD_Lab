<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::all()->where('delete',false);
        if($producto != NULL){
            return response()->json($producto);
        }
        return response()->json([
            "message"=>"No se encontró producto",
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
            'nombreProducto' => ['required'],
            'precioUnitario' => ['required'],
            'stock' => ['required'],
            'categoria' => ['required'],
            'id_cantidads' => ['required'],
            'id_proceso_compras' => ['required'],
        ]);
        if(!is_integer($request->precioUnitario)){
            return response()->json([
                "message"=>"El precioUnitario debe ser un valor entero",
            ]);
        }
        if(!is_integer($request->stock)){
            return response()->json([
                "message"=>"El stock debe ser un valor entero",
            ]);
        }
        if(!is_integer($request->id_cantidads)){
            return response()->json([
                "message"=>"El id_cantidads debe ser un valor entero",
            ]);
        }
        if(!is_integer($request->id_proceso_compras)){
            return response()->json([
                "message"=>"El id_proceso_compras debe ser un valor entero",
            ]);
        }
        $producto = new Producto();
        $producto->nombreProducto = $request->nombreProducto;
        $producto->precioUnitario = $request->precioUnitario;
        $producto->stock = $request->stock;
        $producto->categoria = $request->categoria;
        $producto->id_cantidads = $request->id_cantidads;
        $producto->id_proceso_compras = $request->id_proceso_compras;
        $producto->delete = false;
        $producto->save();
        return response()->json([
            "message"=>"Se ha creado producto",
            "id"=>$producto->id
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
        $producto = Producto::find($id);
        if($producto != NULL && $producto->delete == false){
            return response()->json($producto);
        }
        return response()->json([
            "message"=>"No se encontró producto"
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
        if($producto!=NULL){
            if($request->nombreProducto!=NULL){
                $producto->nombreProducto = $request->nombreProducto;
            }
            if($request->precioUnitario!=NULL){
                $producto->precioUnitario = $request->precioUnitario;
            }
            if($request->stock!=NULL){
                $producto->stock = $request->stock;
            }
            if($request->categoria!=NULL){
                $producto->categoria = $request->categoria;
            }
            if($request->id_cantidads!=NULL){
                $producto->id_cantidads = $request->id_cantidads;
            }
            if($request->id_proceso_compras!=NULL){
                $producto->id_proceso_compras = $request->id_proceso_compras;
            }
            if($request->delete!=NULL){
                $producto->delete = $request->delete;
            }
        }
        return response()->json([
            "message"=>"No se encontró producto"
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
        $producto = Producto::find($id);
        if($producto != NULL){
            $producto->delete = true;
            $producto->save();
            return response()->json([
                "message"=> "SoftDelete a producto",
                "id"=>$producto->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el producto"
        ],404);
    }
}
