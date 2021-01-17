<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metodo_de_pago;
use App\Models\Transaccion;

class Metodo_de_pagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metodo_de_pago = Metodo_de_pago::all()->where('delete',false);
        if($metodo_de_pago != NULL){
            return response()->json($metodo_de_pago);
        }
        return response()->json([
            "message"=>"No se encontró metodo_de_pago",
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
            'numero_tarjeta' => ['required'],
            'tipo_de_cuenta_bancaria' => ['required'],
            'banco' => ['required'],
            'titular' => ['required'],
            'id_transaccions' => ['required'],
        ]);
        $transaccion = Transaccion::find($request->id_transaccions);
        if($transaccion  == NULL){
            return response()->json([
                "message"=>"No se encontró método",
                "id"=>$transaccion->id,
            ],404);
        }
        $metodo_de_pago = new Metodo_de_pago();
        $metodo_de_pago->numero_tarjeta = $request->numero_tarjeta;
        $metodo_de_pago->tipo_de_cuenta_bancaria = $request->tipo_de_cuenta_bancaria;
        $metodo_de_pago->banco = $request->banco;
        $metodo_de_pago->titular = $request->titular;
        $metodo_de_pago->id_transaccions = $request->id_transaccions;
        $metodo_de_pago->delete = false;
        $metodo_de_pago->save();
        return response()->json([
            "message"=>"Se ha creado metodo_de_pago",
            "id"=>$metodo_de_pago->id
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
        $metodo_de_pago = Metodo_de_pago::find($id);
        if($metodo_de_pago != NULL && $metodo_de_pago->delete == false){
            return response()->json($metodo_de_pago);
        }
        return response()->json([
            "message"=>"No se encontró metodo_de_pago"
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
        $metodo_de_pago = Metodo_de_pago::find($id);
        if($metodo_de_pago!=NULL){
            if($request->numero_tarjeta!=NULL){
                $metodo_de_pago->numero_tarjeta = $request->numero_tarjeta;
            }
            if($request->tipo_de_cuenta_bancaria!=NULL){
                $metodo_de_pago->tipo_de_cuenta_bancaria = $request->tipo_de_cuenta_bancaria;
            }
            if($request->banco!=NULL){
                $metodo_de_pago->banco = $request->banco;
            }
            if($request->titular!=NULL){
                $metodo_de_pago->titular = $request->titular;
            }
            if($request->id_transaccions!=NULL){
                $transaccion = Transaccion::find($request->id_transaccions);
                if($transaccion != NULL){
                    $metodo_de_pago->id_transaccions = $request->id_transaccions;
                }
            }
            if($request->delete!=NULL){
                $metodo_de_pago->delete = $request->delete;
            }
            $metodo_de_pago->save();
            return response()->json($metodo_de_pago);
        }
        return response()->json([
            "message"=>"No se encontró metodo_de_pago"
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
        $metodo_de_pago = Metodo_de_pago::find($id);
        if($metodo_de_pago != NULL){
            $metodo_de_pago->delete = true;
            $metodo_de_pago->save();
            return response()->json([
                "message"=> "SoftDelete a metodo_de_pago",
                "id"=>$metodo_de_pago->id
            ]);
        }
        return response()->json([
            "message"=>"No se encontró el metodo_de_pago"
        ],404);
    }
}
