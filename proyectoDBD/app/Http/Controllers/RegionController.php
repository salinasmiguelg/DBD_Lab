<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $region = Region::all()->where($region->delete,false);
        return reponse()->json($region);
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
        $region = new Region();
        $validatedData = $request->validate([
            'nombre' => ['require' , 'min:2' , 'max:30']
        ]);
        $region->nombre = $request->nombre;
        return response()->json([
        "mesage"=>"Se ha creado una region",
        "id" => $region->id
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
        $region = Region::find($id);
        return response()->json($region);
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
        $region = Region::find($id);
        if($request->nombre != NULL){
            $region->nombre = $request->nombre;
        }
        $region->save();
        return response()->jason($region);
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
        $region = Region::find($id);
        if($region != NULL){
           $region->delete = true; 
        }
        else{
            "message" => "id inexistente"
        }
        return response()->json($region);
    }
}
