<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;
class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $puesto = Puesto::all()->where($puesto->delete,false);
        return reponse()->json($puesto);
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
        $puesto = new Puesto();
        $validatedData = $request->validate([
            'categoria' => ['require' , 'min:2' , 'max:30'],
            'descripcion' => ['require' , 'min:2' , 'max:150']
        ]);
        $puesto->nombre = $request->nombre;
        $puesto->descripcion = $request->descripcion;
        return response()->json([
        "mesage"=>"Se ha creado una region",
        "id" => $puesto->id
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
        $puesto = Puesto::find($id);
        return response()->json($puesto);
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
        $puesto = Puesto::find($id);
        if($request->nombre != NULL){
            $puesto->nombre = $request->nombre;
        }
        if($request->descripcion != NULL){
            $puesto->descripcion = $request->descripcion;
        }
        $puesto->save();
        return response()->jason($puesto);
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
        $puesto = Puesto::find($id);
        if($puesto != NULL){
           $puesto->delete = true; 
        }
        else{
            "message" => "id inexistente"
        }
        return response()->json($puesto);
    }
}
