<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::all();
        
        if (request()->expectsJson()) {
            return response()->json($personas);
        }
        
        return view('personas.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos_personas = ['Residente', 'Visitante'];
        return view('personas.create', compact('tipos_personas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:personas',
            'documento_identidad' => 'required|string|max:20|unique:personas',
            'telefono' => 'nullable|string|max:15',
            'tipo_persona' => 'required|in:Residente,Visitante',
        ]);

        $persona = Persona::create($validated);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Persona creada exitosamente', 'unidad' => $persona]);
        }

        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $persona = Persona::findOrFail($id);

        if (request()->expectsJson()) {
            return response()->json($persona);
        }

        return view('personas.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        $tipos_personas = ['Residente', 'Visitante'];
        return view('personas.edit', compact('persona', 'tipos_personas')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'documento_identidad' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:255',
            'tipo_persona' => 'required|string',
        ]);

        // Buscar la persona y actualizar sus datos
        $persona = Persona::findOrFail($id);
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->documento_identidad = $request->documento_identidad;
        $persona->email = $request->email;
        $persona->telefono = $request->telefono;
        $persona->tipo_persona = $request->tipo_persona;
        $persona->save();

        // Redirigir a la página de índice con un mensaje de éxito
        return redirect()->route('personas.index')->with('success', 'Persona actualizada correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();

        if (request()->expectsJson()) {
            return response()->json(['message' => 'Persona eliminada exitosamente']);
        }
        
        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
    }
}
