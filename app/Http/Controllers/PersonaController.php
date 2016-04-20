<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Persona;

class PersonaController extends Controller
{

    public function __construct()
    {
        $this->middleware('cors');
    }

    public function index()
    {
        $personas = Persona::all();
        return response()->json([
            'error' => false,
            'personas' => $personas
        ]);
    }

    public function store(Request $request)
    {
        if(!empty($request->get('nombre')) && !empty($request->get('apellido')) && !empty($request->get('tipo_identificacion')) && !empty($request->get('identificacion')) && !empty($request->get('regimen')) && !empty($request->get('tipo_persona')) && !empty($request->get('estado_civil')) && !empty($request->get('sexo')) && !empty($request->get('latitud')) && !empty($request->get('longitud')))
        {
            $persona = new Persona();
            $persona->nombre = $request->get('nombre');
            $persona->apellido = $request->get('apellido');
            $persona->tipo_identificacion = $request->get('tipo_identificacion');
            $persona->identificacion = $request->get('identificacion');
            $persona->regimen = $request->get('regimen');
            $persona->tipo_persona = $request->get('tipo_persona');
            $persona->estado_civil = $request->get('estado_civil');
            $persona->sexo = $request->get('sexo');
            $persona->latitud = $request->get('latitud');
            $persona->longitud = $request->get('longitud');
            if($persona->save())
            {
                return response()->json([
                    'error' => false,
                    'mensaje' => 'Datos Almacenados Exitosamente'
                ]);
            }
            return response()->json([
                'error' => true,
                'mensaje' => 'Error al registrar los datos, intente nuevamente'
            ]);
        }
        return response()->json([
            'error' => true,
            'mensaje' => "Verifique que los campos no esten vacios"
        ]);
    }
}
