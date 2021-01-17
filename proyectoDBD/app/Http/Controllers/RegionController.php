<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\User;
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
        $region = Region::all()->where('delete',false);
        if($region != NULL){
            return response()->json($region);
        }
        return reponse()->json([
            "message" => "No se encontro Region",
        ], 404);
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
            'nombre' => ['required' , 'min:2' , 'max:30'],
            'id_users' => ['required' , 'numeric']
        ]);
        //Se verifican las llaves foraneas
        $user = User::find($request->id_users);
        if($user == NULL){
            return response()->json([
                'message'=>'No existe usuario con esa id']);
        }

        $region->nombre = $request->nombre;
        $region->delete = false;
        $region->save();
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
        if($region == NULL or $region->delete == true){
            return response()->json([
                'message'=>'No se encontro Region'
            ]);
        }
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
        if($request->delete != NULL){
            $region->delete = $request->delete;
        }
        $region->save();
        return response()->json($region);
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
           $region->save();
           return response()->json([
            "message"=> "SoftDelete a region",
            "id"=>$region->id
        ]);
        }
        else{
            return response()->json([
                "message" => "id inexistente"]);
        }
    }
}
