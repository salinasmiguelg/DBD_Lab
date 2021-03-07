<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comprobante;
use App\Models\User;
class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobante = Comprobante::all()->where('delete',false);
        if($comprobante != NULL){
            return response()->json($comprobante);
        }
        return response()->json([
            "message"=>"No se encontró comprobante",
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
        $validated = $request->validate([
            'tipo' => ['required'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'direccionDespacho' => ['required'],
            'metodoPago' => ['required'],
            'tipoDespacho' => ['required'],
            'total' => ['required'],
            ]);
            /*
            'id_users' => ['required'],
        ]);
        if(!is_integer($request->id_users)){
            return response()->json([
                "message"=>"La id_users debe ser un valor entero",
            ]);
        }
        $user = User::find($id_users);
        if($user  == NULL){
            return response()->json([
                "message"=>"No se encontró el usuario",
                "id"=>$user->id,
            ],404);
        }
        */
        $comprobante = new Comprobante();
        $comprobante->tipo = $request->tipo;
        $comprobante->id_users = (int)$request->id_users;
        $comprobante->nombre = $request->nombre;
        $comprobante->apellido = $request->apellido;
        $comprobante->direccionDespacho = $request->direccionDespacho;
        $comprobante->metodoPago = $request->metodoPago;
        $comprobante->tipoDespacho = $request->tipoDespacho;
        $comprobante->total = $request->total;

        $comprobante->delete = false;
        $comprobante->save();
        $id = (int)$request->id_users;
        $user = User::find($id);
        print_r($user->id);
        echo '<div class="alert alert-danger">Se a creado el comprobante</div>';
        return redirect()->action([UserController::class, 'continueSession'], ['id' => $user->id]);
        //return view('pago', compact('user','comprobante'));
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $idC)
    {
        $comprobante = Comprobante::find($idC);
        $user = User::find($id);
        if($comprobante != NULL && $comprobante->delete == false){
            return response()->json($comprobante);
        }
        return view('comprobante', compact('comprobante','user'))
        //return view('comprobante', compact('user', 'rol', 'transaccion'));
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
        $comprobante = Comprobante::find($id);
        if($comprobante!=NULL){
            if($request->tipo!=NULL){
                $comprobante->tipo = $request->tipo;
            }
            if($request->nombre!=NULL){
                $comprobante->nombre = $request->nombre;
            }
            if($request->apellido!=NULL){
                $comprobante->apellido = $request->apellido;
            }
            if($request->direccionDespacho!=NULL){
                $comprobante->direccionDespacho = $request->direccionDespacho;
            }
            if($request->metodoPago!=NULL){
                $comprobante->metodoPago = $request->metodoPago;
            }
            if($request->tipoDespacho!=NULL){
                $comprobante->tipoDespacho = $request->tipoDespacho;
            }
            if($request->total!=NULL){
                $comprobante->total = $request->total;
            }
            if($request->id_users!=NULL){
                $user = User::find($id_users);
                if($user != NULL){
                    $comprobante->id_users = $request->id_users;
                }
            }
            if($request->delete!=NULL){
                $comprobante->delete = $request->delete;
            }
            $comprobante->save();
            return response()->json($comprobante);
        }
        return response()->json([
            "message"=>"No se encontró comprobante"
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
        $comprobante = Comprobante::find($id);
        if($comprobante != NULL){
            $comprobante->delete = true;
            $comprobante->save();
            return response()->json([
                "message"=> "SoftDelete a comprobante",
                "id"=>$comprobante->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el comprobante"
        ],404);
    }
}
