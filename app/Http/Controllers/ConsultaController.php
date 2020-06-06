<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultaRequest; //  importamos nuestro form request personalizado
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Propietario;
use App\Paciente;
use App\Consulta;
use Carbon\Carbon;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function inicio(){

        $buscar = '';
        $radioPaciente = [
            'value' =>  'paciente',
            'status'    =>  true
        ];
        $radioProp = [
            'value' =>  'propietario',
            'status'    =>  false
        ];
        $pacientes = null;
        $propietarios = null;
        return view('inicio', compact('buscar', 'pacientes', 'propietarios', 'radioPaciente', 'radioProp'));

    }
    public function buscar ( Request $request ) {

        $dataValidata = $request->validate([
            'buscar'    =>  'required'
        ]);

        $buscar =   $dataValidata['buscar'];

        $filtro =   $request->busqueda;

        $radioPaciente = [
            'value' =>  'paciente',
            'status'    =>  false
        ];
        $radioProp = [
            'value' =>  'propietario',
            'status'    =>  false
        ];
        $pacientes = null;
        $propietarios = null;

        if ( $filtro === $radioPaciente['value'] ) {
            $pacientes = Paciente::with('propietario')->whereLike('nom_paciente', $buscar)->paginate(1);
            $radioPaciente['status'] = true;
            $radioProp['status'] = false;
            
        } elseif ( $filtro === $radioProp['value'] ) {

            $propietarios = Propietario::with('pacientes')
            ->whereLike('nom_prop', $buscar)
            ->orWhereLike('ape_prop', $buscar)
            ->paginate(1);
            $radioPaciente['status'] = false;
            $radioProp['status'] = true;

        }
        
        return view('inicio', compact('pacientes', 'propietarios', 'buscar', 'radioPaciente', 'radioProp'));

    }

    public function nuevaConsulta(){

        // $fecha = Carbon::createFromFormat('d/m/Y', '01/01/2020')->format('Y-m-d');
        return view("nuevaconsulta");

    }

    public function agendaHoras(Request $request){

        $datos = Consulta::where('id_paciente','=', $request->id_paciente)->get();

        return view('agendahora', compact('datos'));

    }

    public function lista(){
        
        $consulta = Consulta::all();


        return view("listar", compact("consulta"));

    }


    public function llenarNuevaConsultaPA(Request $request)
    {
        //
        $datos = Consulta::where('id_paciente','=', $request->id_paciente)->get(); 

        return view("nuevaconsultaPA", compact("datos"));

    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //  para crear un request utilizamos php artisan make:request StoreConsultaRequest
    //  los form request quedan en la carpeta app-->Http->Requests
    public function store(StoreConsultaRequest $request)
    {

        dd( $request );
        DB::beginTransaction();
        try {
                    
            //Información propietario
            $propietario  = Propietario::create([
                'nom_prop' => $request->nom_prop
                // 'ape_prop' => $request->ape_prop,
                // 'direccion_prop' => $request->direccion_prop,            
                // 'fono_prop' => $request->fono_prop,
                // 'email_prop' => $request->email_prop
            ]);
            
            
            //Información paciente
            $paciente = Paciente::create([
                'id_prop' => $propietario->id_prop,
                'nom_paciente' => $request->nom_paciente
                 // 'especie_paciente' => $request->especie_paciente,
                // 'sexo_paciente' => $request->sexo_paciente,
                // 'edad_paciente' => $request->edad_paciente,
                // 'nro_chip_paciente' => $request->nro_chip_paciente
                ]);
            
             // Información consulta
            echo $propietario->id_prop;
            echo  $paciente->id_paciente;
            $consulta = Consulta::create([
                'id_prop' => $propietario->id_prop,
                'id_paciente' => $paciente->id_paciente,
                'desc_consulta' => $request->desc_consulta
            // 'peso_paciente' => $request->peso_paciente,
            // 'temperatura_paciente' => $request->temperatura_paciente,
            // 'observacion_pacientes' => $request->observacion_pacientes,
            // 'fecha_hora_consulta' => $request->fecha_hora_consulta
            ]);
     


            DB::commit();
        }catch (\Exception $e) {
          echo   DB::rollback();
        }





    }

    public function nuevaconsultaPacienteActual(){

        return view('nuevaconsultaPA');

    }

    public function nuevaconsultaPA(Request $request)
    {
        DB::beginTransaction();
        try {
                    
                $consulta = Consulta::create([
                'id_prop' => $request->id_prop,
                'id_paciente' => $request->id_paciente,
                'desc_consulta' => $request->desc_consulta
            // 'peso_paciente' => $request->peso_paciente,
            // 'temperatura_paciente' => $request->temperatura_paciente,
            // 'observacion_pacientes' => $request->observacion_pacientes,
            // 'fecha_hora_consulta' => $request->fecha_hora_consulta
            ]);
     


            DB::commit();
        }catch (\Exception $e) {
          echo   DB::rollback();
        }





    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nombre)
    {
        
        $consulta = DB::table('consultas')
        ->join('pacientes', 'consultas.id_paciente', '=', 'pacientes.id_paciente')
        ->join('propietarios', 'pacientes.id_prop','=', 'propietarios.id_prop')
        ->select( 'pacientes.nom_paciente', 'propietarios.nom_prop', 'consultas.desc_consulta')
        ->get();


        return view("listar", compact("consulta"));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
