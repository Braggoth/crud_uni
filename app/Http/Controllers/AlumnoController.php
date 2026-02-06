<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumno.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumno.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|integer|unique:alumno,codigo',
            'nombre' => 'required|string|max:50',
            'direccion' => 'required|string|max:100',
            'pension' => 'required|numeric|min:0'
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumno.index')->with('success', 'Alumno creado');
    }

    public function edit($codigo)
    {
        $alumno = Alumno::findOrFail($codigo);
        return view('alumno.edit', compact('alumno'));
    }

    public function update(Request $request, $codigo)
    {
        $request->validate([
            'codigo' => 'required|integer',
            'nombre' => 'required|string|max:50',
            'direccion' => 'required|string|max:100',
            'pension' => 'required|numeric|min:0'
        ]);

        $alumno = Alumno::findOrFail($codigo);
        $alumno->update($request->only(['codigo', 'nombre', 'direccion', 'pension']));

        return redirect()->route('alumno.index')->with('success', 'Alumno actualizado');
    }

    public function destroy($codigo)
    {
        $inscripciones = \DB::table('inscripcion')->where('alumno', $codigo)->count();

        if ($inscripciones > 0) {
            return redirect()->route('alumno.index')
                             ->with('error', 'No se puede eliminar el alumno porque tiene inscripciones registradas.');
        }

        Alumno::destroy($codigo);
        return redirect()->route('alumno.index')->with('success', 'Alumno eliminado');
    }
}
