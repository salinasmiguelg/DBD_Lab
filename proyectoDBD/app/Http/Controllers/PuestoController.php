<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;
use App\Models\User;
use App\Models\Feria;
use App\Models\Rol;
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
        $puesto = Puesto::all()->where('delete',false);
        if($puesto != NULL){
            return response()->json($puesto);
        }
        return response()->json([
            "message"=>"No se encontró puesto",
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
        $puesto = new Puesto();
        $validatedData = $request->validate([
            'categoria' => ['require' , 'min:2' , 'max:30'],
            'descripcion' => ['require' , 'min:2' , 'max:150'],
            'delete' => ['require' , 'boolean'],
            'id_ferias' => ['require' , 'numeric'],
            'id_rols' => ['require' , 'numeric'],
            'id_users' => ['require' , 'numeric']
        ]);
        //verificar las llaves foraneas
        $user = User::find($request->id_users);
        if($user == NULL){
            return response()->json([
                'message'=>'No existe usuario con esa id'
        }
        $feria = Feria::find($request->id_ferias);
        if($feria == NULL){
            return response()->json([
                'message'=>'No existe usuario con esa id'
        }
        $rol = Rol::find($request->id_rols);
        if($rol == NULL){
            return response()->json([
                'message'=>'No existe usuario con esa id'
        }
        $puesto->categoria = $request->categoria;
        $puesto->descripcion = $request->descripcion;
        $puesto->delete = $request->delete;
        $puesto->save();
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
        if($puesto == NULL or $puesto->delete == true){
            return response()->json([
                'message'=>'No se encontro una puesto'
            ]);
        }
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
        if($request->categoria != NULL){
            $puesto->categoria = $request->categoria;
        }
        if($request->descripcion != NULL){
            $puesto->descripcion = $request->descripcion;
        }
        if($request->delete != NULL){
            $puesto->delete = $request->delete;
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
           $puesto->save();
        }
        else{
            "message" => "id Puesto inexistente"
        }
        return response()->json($puesto);
    }
}
