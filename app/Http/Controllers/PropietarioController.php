<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePropietarioRequest;
use Illuminate\Support\Facades\Validator;   //  se debe importar el facade Validator
use App\Propietario;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  cargamos todos los propietarios
        $propietarios = Propietario::all();
        return view('propietarios.index', compact('propietarios'));
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
    public function store(Request $request)
    {


        //  mensajes personalizados para validaciones
        $messages = [
            'nom_prop.required'             =>  'El nombre propietario es obligatorio',
            'ape_prop.required'             =>  'El apellido propietario es obligatorio',
            'direccion_prop.required'       =>  'La direccion propietario es obligatoria',
            'fono_prop.required'            =>  'El fono propietario es obligatorio',
            'fono_prop.min'                 =>  'El fono propietario debe tener un mínimo de :min dígitos',
            'fono_prop.max'                 =>  'El fono propietario debe tener un máximo de :max dígitos',
            'email_prop.required'           =>  'El email propietario es obligatorio',
            'email_prop.email'              =>  'El formato del email propietario no es válido',
        ];
        
        //  fachada Validator, recibe como primer argumento los inputs del form
        //  segundo argumento las reglas de validación
        //  tercer argumento los mensajes
        $validator = Validator::make($request->all(), [
            'nom_prop'              =>  'required',
            'ape_prop'              =>  'required',
            'direccion_prop'        =>  'required',
            'fono_prop'             =>  'required|min:8|max:10',
            'email_prop'            =>  'required|email',
        ], $messages);

        $inputs = $request->all();

        //  si la validación pasa entonces creamos aquí nuestra lógica
        if ($validator->passes()) {


            //  registrar el nuevo propietario

            //  respondemos via json 
            return response()->json([
                'success' => true,
                'data'  =>  $inputs
            ]);

        }
        
        return response()->json([
            'success'   =>  false,
            'errors' => $validator->errors()
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function prueba () {

        $propietarios = Propietario::withTrashed()->get();
        
        return view('propietarios.prueba', compact('propietarios'));
    }

    public function crear ( StorePropietarioRequest $request ) {
        // dd( $request );

        $propietario = Propietario::create([
            'nom_prop'          =>  $request->nom_prop,
            'ape_prop'          =>  $request->ape_prop,
            'direccion_prop'    =>  $request->direccion_prop,
            'fono_prop'         =>  $request->fono_prop,
            'email_prop'        =>  $request->email_prop
        ]);

        return redirect()->route('propietarios.prueba')->with('message', [
            'class' =>  'success',
            'title' =>  'Propietario creado',
            'message'   =>  'El propietario ha sido creado exitosamente'
        ]);
    }


    public function show($id)
    {
        //
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

    public function restaurar ( $propDeleted ) {
        //  buscamos el registro y restauramos
        Propietario::onlyTrashed()->find($propDeleted)->restore();
        //  retornamos a la vista y personalizamos nuestro mensaje
        return redirect()->route('propietarios.prueba')->with('message', [
            'class' =>  'success',
            'title' =>  'Propietario restaurado',
            'message'   =>  'El propietario ha sido restaurado exitosamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Propietario $propietario )
    {
        try {

            $propietario->delete();

            return back()->with('message', [
                'class' =>  'success',
                'title' =>  'propietario Borrado',
                'message'   =>  'El propietario se ha eliminado exitosamente'
            ]);

        } catch( \Exception $ex ) {

            return back()->with('message', [
                'class' =>  'danger',
                'title' =>  'Ups!',
                'message'   =>  'Error eliminando el propietario'
            ]);
        }
    }
}
