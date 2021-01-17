<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto_producto;
use App\Models\Puesto;
use App\Models\Producto;
class Puesto_productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $puesto_producto = Puesto_producto::all()->where('delete',false);
        if($puesto_producto != NULL){
            return response()->json($puesto_producto);
        }
        return response()->json([
            "message"=>"No se encontró puesto_producto",
        ],404);;
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
        $puesto_producto = new Puesto_producto();
        $validatedData = $request->validate([
            'id_productos' => ['required' , 'numeric'],
            'id_puestos' => ['required' , 'numeric']
        ]);
        $producto = Producto::find($request->id_productos);
        if($producto == NULL){
            return response()->json([
                'message'=>'No existe producto con esa id']);
        }

        $puesto = Puesto::find($request->id_puestos);
        if($puesto == NULL){
            return response()->json([
                'message'=>'No existe puesto con esa id']);
        }
        $puesto_producto->delete = false;
        $puesto_producto->save();
        return response()->json([
            "message"=>"Se ha creado un nuevo puesto_producto",
            "id" => $puesto_producto->id
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
        //
        $puesto_producto = Puesto_producto::find($id);
        if($puesto_producto == NULL or $puesto_producto->delete == true){
            return response()->json([
                'message'=>'No se encontro una puesto_producto'
            ]);
        }
        return response()->json($puesto_producto);
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
        //
        $puesto_producto = Puesto_producto::find($id);
        if($request->delete != NULL){
            $puesto_producto->delete = $request->delete;
        }
        $puesto_producto->save();
        return response()->json($puesto_producto);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $puesto_producto = Puesto_producto::find($id);
        if($puesto_producto != NULL){
           $puesto_producto->delete = true; 
           $puesto_producto->save();
           return response()->json([
            "message"=> "SoftDelete a puesto_producto",
            "id"=>$puesto_producto->id
        ]);
        }
        else{
            return response()->json([
                "message" => "id puesto_producto inexistente"]);
        }
        return response()->json($puesto_producto);
    }
}
