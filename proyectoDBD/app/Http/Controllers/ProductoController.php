<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Cantidad;
use App\Models\Proceso_compra;
use App\Models\Transaccion;
use App\Models\Transaccion_user;
use App\Models\Transaccion_producto;
use App\Models\User;
use App\Models\Rol;
use App\Models\Puesto;
use App\Models\Comuna;
use App\Models\Region;
use App\Models\Puesto_producto;
use App\Models\Feria;
use Illuminate\Support\Facades\DB;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::all()->where('stock','>',0)->where('delete',false);
        if($producto != NULL){
            return view('carro',compact('producto'));
                    }
        
        return response()->json([
            "message"=>"No se encontró producto",
        ],404);
    }
    public function showProduct($id)
    {

        $producto = Producto::all()->where('stock','>',0)->where('delete',false);
        $user = User::find($id);
        if($producto == NULL){
            return view('carro',compact('user','producto'));
        }
        if($user == NULL){
            return view('principal',compact('producto'));
        }
        $transaccion_user = DB::table('transaccion_users')
            ->join('users','users.id','=','transaccion_users.id_users')
            ->where('transaccion_users.delete',false)
            ->where('transaccion_users.id_users',$id)
            ->join('transaccions','transaccions.id','=','transaccion_users.id_transaccions')
            ->where('transaccions.delete',false)
            ->join('transaccion_productos','transaccion_productos.id_transaccions','=','transaccions.id')
            ->select('transaccion_productos.*')
            ->where('transaccion_productos.delete',false)
            ->get();
        $rol_user = Rol::all()->where('id_users',$id)->where('delete',false);
        $idR = 0;
        foreach($rol_user as $rol_user){
            if($rol_user->nombre == "Vendedor"){
                $idR = $rol_user->id_users;
            }
        }
        $rol = Rol::find($idR);
        return view('carro',compact('user','producto','transaccion_user','rol'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombreProducto' => ['required'],
            'precioUnitario' => ['required'],
            'stock' => ['required'],
            'categoria' => ['required'],
            /*
            'id_cantidads' => ['required'],
            'id_proceso_compras' => ['required'],
            */
        ]);
        /*
        if(!is_integer($request->precioUnitario)){
            return response()->json([
                "message"=>"El precioUnitario debe ser un valor entero",
            ]);
        }
        if(!is_integer($request->stock)){
            return response()->json([
                "message"=>"El stock debe ser un valor entero",
            ]);
        }
        if(!is_integer($request->id_cantidads)){
            return response()->json([
                "message"=>"El id_cantidads debe ser un valor entero",
            ]);
        }
        
        $cantidad = Cantidad::find($id_cantidads);
        if($cantidad  == NULL){
            return response()->json([
                "message"=>"No se encontró cantidad",
                "id"=>$cantidad->id
            ],404);
        }
        */
        /*
        if(!is_integer($request->id_proceso_compras)){
            return response()->json([
                "message"=>"El id_proceso_compras debe ser un valor entero",
            ]);
        }
        
        $proceso_compra = Proceso_compra::find($id_proceso_compras);
        if($proceso_compra  == NULL){
            return response()->json([
                "message"=>"No se encontró proceso_compra",
                "id"=>$proceso_compra->id,
            ],404);
        }
        */
        $producto = new Producto();
        $producto->nombreProducto = $request->nombreProducto;
        $producto->precioUnitario = $request->precioUnitario;
        $producto->stock = $request->stock;
        $producto->categoria = $request->categoria;
        $producto->id_cantidads = 1;//(int)$request->id_cantidads;
        $producto->id_proceso_compras = 1; //(int)$request->id_proceso_compras;
        $producto->delete = false;
        $producto->save();

        $id = (int)$request->id_cantidads;
        $user = User::find($id);
        $rol = Rol::all()->where('nombre','Vendedor')->where('id_users',$id);
        if($rol == NULL){
            return view('principal');
        }
        $idRol = 0;
        foreach($rol as $rol){
            $idRol = $rol->id;
        }
        $region = new Region();
        $region->nombre = $request->nombreRegion;
        $region->id_users = $id;
        $region->delete = false;
        $region->save();

        $comuna = new Comuna();
        $comuna->nombre = $request->nombreComuna;
        $comuna->id_regions = $region->id;
        $comuna->delete = false;
        $comuna->save();

        $feria = new Feria();
        $feria->descripcion = $request->nombreFeria;
        $feria->id_comunas = $comuna->id;
        $feria->delete = false;
        $feria->save();

        $puesto = new Puesto();
        $puesto->categoria = $request->categoria;
        $puesto->descripcion = $request->nombrePuesto;
        $puesto->id_ferias = $feria->id;
        $puesto->id_users = $id;
        $puesto->id_rols = $idRol;
        $puesto->delete = false;
        $puesto->save();

        $puesto_producto = new Puesto_Producto();
        $puesto_producto->id_productos = $producto->id;
        $puesto_producto->id_puestos = $puesto->id;
        $puesto_producto->delete = false;
        $puesto_producto->save();

        echo '<div class="alert alert-danger">Se a creado el producto.</div>';
        return redirect()->action([UserController::class, 'continueSession'], ['id' => $user->id]);
        //return view('createProducto', compact('user','producto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        if($producto != NULL && $producto->delete == false && $producto->stock > 0){
            return response()->json($producto);
        }
        return response()->json([
            "message"=>"No se encontró producto"
        ],404);
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
        $producto = Producto::find($id);
        if($producto!=NULL){
            if($request->nombreProducto!=NULL){
                $producto->nombreProducto = $request->nombreProducto;
            }
            if($request->precioUnitario!=NULL){
                $producto->precioUnitario = $request->precioUnitario;
            }
            if($request->stock!=NULL){
                $producto->stock = $request->stock;
            }
            if($request->categoria!=NULL){
                $producto->categoria = $request->categoria;
            }
            if($request->id_cantidads!=NULL){
                $cantidad = Cantidad::find($id_cantidads);
                if($cantidad != NULL){
                    $producto->id_cantidads = $request->id_cantidads;
                }
            }
            if($request->id_proceso_compras!=NULL){
                $proceso_compra = Proceso_compra::find($id_proceso_compras);
                if($proceso_compra != NULL){
                    $producto->id_proceso_compras = $request->id_proceso_compras;
                }
            }
            if($request->delete!=NULL){
                $producto->delete = $request->delete;
            }
            $producto->save();
            return response()->json($producto);
        }
        return response()->json([
            "message"=>"No se encontró producto"
        ],404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        if($producto != NULL){
            $producto->delete = true;
            $producto->save();
            return response()->json([
                "message"=> "SoftDelete a producto",
                "id"=>$producto->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el producto"
        ],404);
    }
}
