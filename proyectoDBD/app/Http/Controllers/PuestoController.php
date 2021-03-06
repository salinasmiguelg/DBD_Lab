<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;
use App\Models\User;
use App\Models\Feria;
use App\Models\Rol;
use App\Models\Comuna;
use Illuminate\Support\Facades\DB;
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
            'categoria' => ['required' , 'min:2' , 'max:30'],
            'descripcion' => ['required' , 'min:2' , 'max:150'],
            'id_ferias' => ['required' , 'numeric'],
            'id_rols' => ['required' , 'numeric'],
            'id_users' => ['required' , 'numeric']
        ]);
        //verificar las llaves foraneas
        $user = User::find($request->id_users);
        if($user == NULL){
            return response()->json([
                'message'=>'No existe usuario con esa id']);
        }
        $feria = Feria::find($request->id_ferias);
        if($feria == NULL){
            return response()->json([
                'message'=>'No existe usuario con esa id']);
        }
        $rol = Rol::find($request->id_rols);
        if($rol == NULL){
            return response()->json([
                'message'=>'No existe usuario con esa id']);
        }
        $puesto->categoria = $request->categoria;
        $puesto->descripcion = $request->descripcion;
        $puesto->delete = false;
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

    public function showPuestos($id,$idU)
    {
        //
        $user = User::find($idU);
        $comuna = Comuna::find($id);
        $ferias = Feria::all()->where('id_comunas',$id)->where('delete',false);
        $ferias_puesto = DB::table('puestos')
            ->join('ferias','ferias.id','=','puestos.id_ferias')
            ->select('ferias.descripcion as descripcion_feria','puestos.*')
            ->where('ferias.id_comunas',$id)
            ->where('ferias.delete',false)
            ->get();
        $rol_user = Rol::all()->where('id_users',$idU)->where('delete',false);
        $idR = 0;
        foreach($rol_user as $rol_user){
            if($rol_user->nombre == "Vendedor"){
                $idR = $rol_user->id_users;
            }
        }
        $rol = Rol::find($idR);

            if($comuna == NULL or $comuna->delete == true){
                return response()->json([
                    'message' => 'No se encontro Comuna']);
            }
        return view('puestos',compact('user','comuna','ferias_puesto','rol'));
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
        return response()->json($puesto);
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
           return response()->json([
            "message"=> "SoftDelete a puesto",
            "id"=>$puesto->id
        ]);
        }
        else{
            return response()->json([
                "message" => "id Puesto inexistente"]);
        }
        return response()->json($puesto);
    }
}
