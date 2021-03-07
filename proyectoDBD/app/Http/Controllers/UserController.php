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
use App\Models\Transaccion;
use App\Models\Transaccion_user;
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

    public function continueSession($id)
    {
        $user = User::find($id);
        $producto = Producto::all()->where('delete',false)->where('stock','>',0);
        $comuna = Comuna::all()->where('delete',false);
        $producto1 = Producto::all()->where('delete',false)->where('stock','>',0);
        $rol_user = Rol::all()->where('id_users',$id)->where('delete',false);
        $idR = 0;
        foreach($rol_user as $rol_user){
            if($rol_user->nombre == "Vendedor"){
                $idR = $rol_user->id;
            }
        }
        $rol = Rol::find($idR);
        if($rol == NULL){
            echo '<div class="alert alert-danger">Este usuario no tiene rol, no podra loguearse</div>';
            return view('login');
        }
        if($user == NULL){
            return view('principal', compact('producto'));
        }
        return view('home',compact('user','producto','comuna','producto1','rol'));
    }

    /*
    public function continuetoPago($id)
    {
        $user = User::find($id);
        $comprobante = Comprobante::find($id)->where('id','id_users');

        $producto = Producto::all()->where('delete',false)->where('stock','>',0);
        $comuna = Comuna::all()->where('delete',false);
        $producto1 = Producto::all()->where('delete',false)->where('stock','>',0);
        $rol_user = Rol::all()->where('id_users',$id)->where('delete',false);
        $idR = 0;
        foreach($rol_user as $rol_user){
            if($rol_user->nombre == "Vendedor"){
                $idR = $rol_user->id;
            }
        }
        $rol = Rol::find($idR);
        if($user == NULL){
            view('principal', compact('producto'));
        }
        return view('comprobante',compact('user','producto','comuna','producto1','rol','comprobante'));
    }

    */


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
        $user1 = User::all();
        $producto = Producto::all()->where('delete',false)->where('stock','>',0);
        $comuna = Comuna::all()->where('delete',false);
        $producto1 = Producto::all()->where('delete',false)->where('stock','>',0);
        foreach($user1 as $user1){
            if($user1->email == $request->email){
                echo '<div class="alert alert-danger">Email ya existente.</div>';
                return view('registro');
            }
        }
        $user = new User();
        $validatedData = $request->validate([
            'nombre' => ['required' , 'min:2' , 'max:30'],
            'apellido' =>['required' , 'min:2' , 'max:30'],
            'contraseña' => ['required' , 'min:8' , 'max:40'],
            'numeroTelefono' => ['required' , 'min:9', 'max:13'],
            'email' => ['required'],
        ]);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->contraseña = $request->contraseña;
        $user->numeroTelefono = $request->numeroTelefono;
        $user->email = $request->email;
        $user->delete = false;
        $user->save();
        $rol = new Rol();
        $rol->nombre = $request->nombreRol;
        print_r($request->nombreRol);
        print_r($rol->nombre);
        $rol->id_users = $user->id;
        $rol->delete = false;
        $rol->save();
        $transaccion = new Transaccion();
        // hacer formula para calcular el monto
        $transaccion->monto = 0;
        // ver forma de colocar la fecha actual
        $transaccion->fechaPago = date('Y-m-d');
        $transaccion->delete = false;
        $transaccion->save();

        $transaccionUser = new Transaccion_user();
        $transaccionUser->id_users = $user->id;
        $transaccionUser->id_transaccions = $transaccion->id;
        $transaccionUser->delete = false;
        $transaccionUser->save();

        $region = new Region();
        $region->nombre = $request->nombreRegion;
        $region->id_users = $user->id;
        $region->delete = false;
        $region->save();

        $comuna = new Comuna();
        $comuna->nombre = $request->nombreComuna;
        $comuna->id_regions = $region->id;
        $comuna->delete = false;
        $comuna->save();


        $direccion = new Direccion();
        $direccion->calle = $request->nombreCalle;
        $direccion->numero = $request->nombreNumero;
        $direccion->es_departamento = $request->esDepartamento;
        $direccion->id_users = $user->id;
        $direccion->id_comunas = $comuna->id;
        $direccion->delete = false;
        $direccion->save();


        return redirect()->action([UserController::class, 'continueSession'], ['id' => $user->id]);
    }
    /*
    public function userValidate(Request $request){
        $idM = $request->email;
        $idA = $request->contraseña;
        $idE = User::where('email' , $idM)->get(['id']);
        $idC = User::where('contraseña' , $idA)->get(['id']);
        $user = User::find($idE);
        $user2 = User::find($idC);
        if($idE->pluck('id')->first() != $idC->pluck('id')->first()){
            return response()->json([
                "message"=> "La contraseña es: ",
                "id"=>$idE->pluck('id')->first()
            ]);
        }
        else{
            return view('home' ,compact('user'));
        }
    }
    */

    public function userValidate(Request $request){

        $user= User::all()->where('email',$request->email);
        $producto = Producto::all()->where('delete',false)->where('stock','>',0);



        if($user==NULL){
            echo '<div class="alert alert-danger">Email o clave incorrecta.</div>';
            return view('login');

        }
        if(count($user) <= 0){
            echo '<div class="alert alert-danger">Email o clave incorrecta.</div>';
            return view('login');
        }

        foreach($user as $user){
            if($user->delete == true){
                echo '<div class="alert alert-danger">Email o clave incorrecta.</div>';
                return view('login');
            }
            //cuando se logea correctamente
            if($user->email == $request->email && $user->contraseña == $request->contraseña){
                $transaccion = new Transaccion();
                // hacer formula para calcular el monto
                $transaccion->monto = 0;
                // ver forma de colocar la fecha actual
                $transaccion->fechaPago = date('Y-m-d');
                $transaccion->delete = false;
                $transaccion->save();

                $transaccionUser = new Transaccion_user();
                $transaccionUser->id_users = $user->id;
                $transaccionUser->id_transaccions = $transaccion->id;
                $transaccionUser->delete = false;
                $transaccionUser->save();

                return redirect()->action([UserController::class, 'continueSession'], ['id' => $user->id]);
                //return view('home',compact('user','producto'));
            }
            else{
                echo '<div class="alert alert-danger">Email o clave incorrecta.</div>';
                return view('login');
            }
        }

        return view('login');

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
        return view('edit')->with('user',$user);
    }
    public function showCrearProducto($id)
    {
        $user = User::find($id);
        $rol_user = Rol::all()->where('id_users',$id)->where('delete',false);
            $idR = 0;
            foreach($rol_user as $rol_user){
                if($rol_user->nombre == "Vendedor"){
                    $idR = $rol_user->id_users;
                }
            }
            $rol = Rol::find($idR);
        return view('createProducto',compact('user','rol'));
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
        $rol_user = Rol::all()->where('id_users',$id)->where('delete',false);
        $idR = 0;
        foreach($rol_user as $rol_user){
            if($rol_user->nombre == "Vendedor"){
                $idR = $rol_user->id_users;
            }
        }
        $rol1 = Rol::find($idR);


        return view('perfil',compact('user','region','direccion','rol','comuna_user','rol1'));
    }//acordarse que es en perfil rol1

    public function showFeriante($id,$idU)
    {
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
        $user = User::find($idU);

        $rol_user = Rol::all()->where('id_users',$idU)->where('delete',false);
        $idR = 0;
        foreach($rol_user as $rol_user){
            if($rol_user->nombre == "Vendedor"){
                $idR = $rol_user->id_users;
            }
        }
        $rol = Rol::find($idR);
        if($producto == NULL or $producto->delete == true){
            return response()->json([
                'message' => 'No se encontro Producto']);
        }
        return view('feriantes',compact('user','producto','puesto_producto','puestoProducto_user','rol'));
    }


    public function showPago($id)
    {
        //
        $user = User::find($id);
        $transaccion_user = DB::table('transaccion_users')
            ->join('users','users.id','=', 'transaccion_users.id_users')
            ->select('transaccion_users.id_transaccions')
            ->where('users.delete',false)
            ->where('users.id', $id)
            ->get();
        $idT = 0;
        foreach($transaccion_user as $transaccion_user){
            $idT = $transaccion_user->id_transaccions;
        }
        $transaccion = Transaccion::find($idT);
        $rol_user = Rol::all()->where('id_users',$id)->where('delete',false);
        $idR = 0;
        foreach($rol_user as $rol_user){
            if($rol_user->nombre == "Vendedor"){
                $idR = $rol_user->id_users;
            }
        }
        $rol = Rol::find($idR);
        $transaccion_producto = DB::table('transaccion_users')
            ->join('users','users.id','=','transaccion_users.id_users')
            ->where('transaccion_users.delete',false)
            ->where('transaccion_users.id_users',$id)
            ->join('transaccions','transaccions.id','=','transaccion_users.id_transaccions')
            ->where('transaccions.delete',false)
            ->join('transaccion_productos','transaccion_productos.id_transaccions','=','transaccions.id')
            ->select('transaccion_productos.*')
            ->where('transaccion_productos.delete',false)
            ->get();


        //guardar total en transaccion

        $transaccion_producto1 = DB::table('transaccion_users')
        ->join('users','users.id','=','transaccion_users.id_users')
        ->where('transaccion_users.delete',false)
        ->where('transaccion_users.id_users',$id)
        ->join('transaccions','transaccions.id','=','transaccion_users.id_transaccions')
        ->where('transaccions.delete',false)
        ->join('transaccion_productos','transaccion_productos.id_transaccions','=','transaccions.id')
        ->select('transaccion_productos.*')
        ->where('transaccion_productos.delete',false)
        ->get();
        return view('pago',compact('user','transaccion','transaccion_producto','transaccion_producto1'));
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
            $rol_user = Rol::all()->where('id_users',$id)->where('delete',false);
            $idR = 0;
            foreach($rol_user as $rol_user){
                if($rol_user->nombre == "Vendedor"){

                    $idR = $rol_user->id_users;
                }
            }
            $rol1 = Rol::find($idR);
            return view('perfil',compact('user','region','direccion','rol','comuna_user','rol1'));
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
            $rol_user = Rol::all()->where('id_users',$id)->where('delete',false);
            $idR = 0;
            foreach($rol_user as $rol_user){
                if($rol_user->nombre == "Vendedor"){

                    $idR = $rol_user->id_users;
                }
            }
            $rol = Rol::find($idR);
            return view('edit',compact('user','rol'));
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
