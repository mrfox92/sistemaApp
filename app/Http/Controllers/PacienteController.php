<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePacienteRequest;
use Illuminate\Http\Request;
use App\Consulta;
use App\Propietario;
use App\Paciente;

class PacienteController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->only(['historialPaciente']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,string $id)
    {
    

    }

    //Muestra las atenciones pasadas del paciente
    public function historialPaciente( Paciente $paciente ){

        $historial = Consulta::where('id_paciente','=', $paciente->id_paciente)->paginate(1); 
        return view('historialpaciente')->with('historial', $historial);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit (Paciente $paciente) {

        return view('pacientes.editarPaciente', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePacienteRequest $paciente_request, Paciente $paciente)
    {
        // dd( $paciente_request );
        $paciente->fill( $paciente_request->input() )->save();
        //  redirigimos a la ruta del formulario edición con la data editada y guardada
        //  además se añade un mensaje personalizado

        return redirect()->route('pacientes.editar', ['paciente' => $paciente->id_paciente])
            ->with('message', [
                'class'     =>  'success',
                'title'     =>  'Datos actualizados!',
                'message'   => 'Datos paciente actualizados con éxito'
            ]);
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
