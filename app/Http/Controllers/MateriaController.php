<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Facultad;
use App\Models\Carrera;
use App\Models\Malla;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::with(['facultadRelacion','carreraRelacion','mallaRelacion'])->get();
        return view('materia.index', compact('materias'));
    }

    public function create()
    {
        $facultades = Facultad::all();
        $carreras = Carrera::all();
        $mallas = Malla::all();
        return view('materia.create', compact('facultades','carreras','mallas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|integer|unique:materia,codigo',
            'nombre' => 'required|string|max:50',
            'facultad' => 'required|exists:facultad,codigo',
            'carrera' => 'required|exists:carrera,codigo',
            'malla' => 'required|integer'
        ]);

        Materia::create($request->all());
        return redirect()->route('materia.index')->with('success','Materia creada');
    }

    public function edit($codigo)
    {
        $materia = Materia::findOrFail($codigo);
        $facultades = Facultad::all();
        $carreras = Carrera::all();
        $mallas = Malla::all();

        return view('materia.edit', compact('materia','facultades','carreras','mallas'));
    }

    public function update(Request $request, $codigo)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'facultad' => 'required|exists:facultad,codigo',
            'carrera' => 'required|exists:carrera,codigo',
            'malla' => 'required|integer'
        ]);

        $materia = Materia::findOrFail($codigo);
        $materia->update($request->all());

        return redirect()->route('materia.index')->with('success','Materia actualizada');
    }

    public function destroy($codigo)
    {
        Materia::destroy($codigo);
        return redirect()->route('materia.index')->with('success','Materia eliminada');
    }
}
