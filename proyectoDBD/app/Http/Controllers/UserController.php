<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comuna;
use App\Models\Region;
use App\Models\Direccion;
use App\Models\Rol;
use App\Models\Producto;
use App\Models\Puesto_producto;
use App\Models\Puesto;
use Illuminate\Support\Facades\DB;

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
        $user = User::all()->where('delete',false);
        if($user != NULL){
            return response()->json($user);
        }
        return reponse()->json([
            "message" => "No se encontro User",
        ], 404);


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
            'nombre' => ['required' , 'min:2' , 'max:30'],
            'apellido' =>['required' , 'min:2' , 'max:30'],
            'contraseña' => ['required' , 'min:8' , 'max:100'],
            'numeroTelefono' => ['required' , 'min:9', 'max:11'],
            'email' => ['required'],
        ]);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->contraseña = $request->contraseña;
        $user->numeroTelefono = $request->numeroTelefono;
        $user->email = $request->email;
        $user->delete = false;
        $user->save();
        return redirect('/');
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
        if($user == NULL or $user->delete == true){
            return response()->json([
                'message' => 'No se encontro User']);
        }
        return response()->json($user);
    }

    public function showPerfil($id)
    {
        //
        $user = User::find($id);
        $region = Region::all()->where('id_users',$id)->where('delete',false);
        $direccion = Direccion::all()->where('id_users',$id)->where('delete',false);
        $rol = Rol::all()->where('id_users',$id)->where('delete',false);
        
        $comuna_user = DB::table('comunas')
            ->join('regions','regions.id','=','comunas.id_regions')
            ->select('comunas.nombre')
            ->where('comunas.delete',false)
            ->where('regions.id_users',$id)
            ->get();

        
        if($user == NULL or $user->delete == true){
            return response()->json([
                'message' => 'No se encontro User']);
        }
        
        return view('perfil',compact('user','region','direccion','rol','comuna_user'));
    }

    public function showFeriante($id)
    {
        //
        $producto = Producto::find($id);
        $puesto_producto = Puesto_producto::all()->where('id_productos',$id)->where('delete',false);

        $puestoProducto_user = DB::table('puesto_productos')
            ->join('puestos','puestos.id','=','puesto_productos.id_puestos')
            ->where('puesto_productos.id_productos',$id)
            ->where('puestos.delete',false)
            ->join('rols','rols.id','=','puestos.id_rols')
            ->where('rols.delete',false)
            ->join('users','users.id','=','rols.id_users')
            ->select('users.*')
            ->where('users.delete',false)
            ->get();

            if($producto == NULL or $producto->delete == true){
                return response()->json([
                    'message' => 'No se encontro Producto']);
            }

        
        return view('feriantes',compact('producto','puesto_producto','puestoProducto_user'));
    }

    
    public function showPerfilPago($id)
    {
        //
        $user = User::find($id);
        $region = Region::all()->where('id_users',$id)->where('delete',false);
        $direccion = Direccion::all()->where('id_users',$id)->where('delete',false);
        
        $comuna_user = DB::table('comunas')
            ->join('regions','regions.id','=','comunas.id_regions')
            ->select('comunas.nombre')
            ->where('comunas.delete',false)
            ->where('regions.id_users',$id)
            ->get();

        
        if($user == NULL or $user->delete == true){
            return response()->json([
                'message' => 'No se encontro User para proceso de pago']);
        }
        
        return view('pago',compact('user','region','direccion','comuna_user'));
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

        $region = Region::all()->where('id_users',$id)->where('delete',false);
        $direccion = Direccion::all()->where('id_users',$id)->where('delete',false);
        $rol = Rol::all()->where('id_users',$id)->where('delete',false);
        
        $comuna_user = DB::table('comunas')
            ->join('regions','regions.id','=','comunas.id_regions')
            ->select('comunas.nombre')
            ->where('comunas.delete',false)
            ->where('regions.id_users',$id)
            ->get();

        if($user!=NULL){
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
            if($request->delete != NULL){
                $user->delete = $request->delete;
            }
            $user->save();
            return view('perfil',compact('user','region','direccion','rol','comuna_user'));
        }
        return response()->json([
            "message"=>"No se encontró usuario"
        ],404);

    }

    public function updatePerfil(Request $request, $id)
    {
        //
        $user = User::find($id);
        if($user!=NULL){
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
            if($request->delete != NULL){
                $user->delete = $request->delete;
            }
            $user->save();
            return view('edit',compact('user'));
        }
        return response()->json([
            "message"=>"No se encontró usuario"
        ],404);

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
           $user->save();
           return response()->json([
            "message"=> "SoftDelete a user",
            "id"=>$user->id
        ]);
        }
        else{
            return response()->json([
                "message" => "id inexistente"]);
        }

    }
}
