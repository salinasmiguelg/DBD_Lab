<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna;
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
        $comuna = Comuna::all()->where($comuna->delete,false);
        return reponse()->json($comuna);
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
            'nombre' => ['require' , 'min:2' , 'max:30']
        ]);
        $comuna->nombre = $request->nombre;
        return response()->json([
        "mesage"=>"Se ha creado una region",
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
        }
        else{
            "message" => "id inexistente"
        }
        return response()->json($comuna);
    }
}
