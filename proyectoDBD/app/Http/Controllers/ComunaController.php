<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna;
use App\Models\Region;
class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comuna = Comuna::all()->where('delete',false);
        if($comuna != NULL){
            return response()->json($comuna);
        }
        return response()->json([
            "message"=>"No se encontró comuna",
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
        $comuna = new Comuna();
        $validatedData = $request->validate([
            'nombre' => ['require' , 'min:2' , 'max:30'],
            'delete' => ['require' , 'boolean'],
            'id_regions' => ['require' , 'numeric']
        ]);
        //Se verifican que las llaves foraneas del elemento a guardar exitan como tal
        $region = Region::find($request->id_regions);
        if($region == NULL){
            return response()->json([
                'message'=>'No existe Region con esa id'
        }

        $comuna->nombre = $request->nombre;
        $comuna->delete = $request->delete;
        return response()->json([
        "mesage"=>"Se ha creado una Comuna",
        "id" => $comuna->id
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
        $comuna = Comuna::find($id);
        if($comuna == NULL or $comuna->delete == true){
            return response()->json([
                'message'=>'No se encontro una comuna'
            ]);
        }
        return response()->json($comuna);

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
        $comuna = Comuna::find($id);
        if($request->nombre != NULL){
            $comuna->nombre = $request->nombre;
        }
        if($request->delete != NULL){
            $comuna->delete = $request->delete;
        }
        $comuna->save();
        return response()->jason($comuna);
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
        $comuna = Comuna::find($id);
        if($comuna != NULL){
           $comuna->delete = true; 
           $comuna->save();
        }
        else{
            "message" => "id Comuna inexistente"
        }
        return response()->json($comuna);
    }
}
