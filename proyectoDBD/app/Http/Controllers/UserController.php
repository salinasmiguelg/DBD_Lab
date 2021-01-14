<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //obtener datos
    public function index()
    {
        //
        $user = User::all()->where($user->delete,false);
        return reponse()->json($user);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // crear una nueva tupla
    public function store(Request $request)
    {
        //
        $user = new User();
        $validatedData = $request->validate([
            'nombre' => ['require' , 'min:2' , 'max:30'],
            'apellido' =>['require' , 'min:2' , 'max:30'],
            'contraseña' => ['require' , 'min:8' , 'max:15'],
            'numeroTelefono' => ['require' , 'min:9', 'max:11'],
            'email' => ['require']
        ]);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->contraseña = $request->contraseña;
        $user->numeroTelefono = $request->numeroTelefono;
        $user->email = $request->email;
        return response()->json([
        "mesage"=>"Se ha creado un usuario",
        "id" => $user->id
        ],202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //obtener por id
    public function show($id)
    {
        //
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //actualizar tupla con id
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        if($request->nombre != NULL){
            $user->nombre = $request->nombre;
        }
        if($request->apellido != NULL){
          $user->apellido = $request->apellido;  
        }
        if($request->contraseña != NULL){
            $user->contraseña = $request->contraseña;
        }
        if($request->numeroTelefono != NULL){
           $user->numeroTelefono = $request->numeroTelefono; 
        }
        if($request->email != NULL){
            $user->email = $request->email;
        }
        $user->save();
        return response()->jason($user);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //borrar una tupla especifica
    public function destroy($id)
    {
        //
        $user = User::find($id);
        if($user != NULL){
           $user->delete = true; 
        }
        else{
            "message" => "id inexistente"
        }
        return response()->json($user);

    }
}
