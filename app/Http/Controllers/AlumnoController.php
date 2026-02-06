<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with('carreraRelacion')->get();
        return view('alumno.index', compact('alumnos'));
    }

    public function create()
    {
        $carreras = Carrera::all();
        return view('alumno.create', compact('carreras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|integer|unique:alumno,codigo',
            'cedula' => 'required|string|max:10',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'correo' => 'required|email|max:100',
            'carrera' => 'required|exists:carrera,codigo'
        ]);

        Alumno::create($request->all());
        return redirect()->route('alumno.index')->with('success', 'Alumno creado');
    }

    public function edit($codigo)
    {
        $alumno = Alumno::findOrFail($codigo);
        $carreras = Carrera::all();
        return view('alumno.edit', compact('alumno', 'carreras'));
    }

    public function update(Request $request, $codigo)
    {
        $request->validate([
            'cedula' => 'required|string|max:10',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'correo' => 'required|email|max:100',
            'carrera' => 'required|exists:carrera,codigo'
        ]);

        $alumno = Alumno::findOrFail($codigo);
        $alumno->update($request->all());

        return redirect()->route('alumno.index')->with('success', 'Alumno actualizado');
    }

    public function destroy($codigo)
    {
        Alumno::destroy($codigo);
        return redirect()->route('alumno.index')->with('success', 'Alumno eliminado');
    }
}
