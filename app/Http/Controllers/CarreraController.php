<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Facultad;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index()
    {
        $carreras = Carrera::with('facultadRelacion')->get();
        return view('carrera.index', compact('carreras'));
    }

    public function create()
    {
        $facultades = Facultad::all();
        return view('carrera.create', compact('facultades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|integer|unique:carrera,codigo',
            'nombre' => 'required|string|max:50',
            'facultad' => 'required|exists:facultad,codigo'
        ]);

        Carrera::create($request->all());
        return redirect()->route('carrera.index')->with('success', 'Carrera creada');
    }

    public function edit($codigo)
    {
        $carrera = Carrera::findOrFail($codigo);
        $facultades = Facultad::all();
        return view('carrera.edit', compact('carrera', 'facultades'));
    }

    public function update(Request $request, $codigo)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'facultad' => 'required|exists:facultad,codigo'
        ]);

        $carrera = Carrera::findOrFail($codigo);
        $carrera->update($request->all());

        return redirect()->route('carrera.index')->with('success', 'Carrera actualizada');
    }
    public function destroy($codigo)
    {
        $mallas = \DB::table('malla')->where('carrera', $codigo)->count();

        if ($mallas > 0) {
            return redirect()->route('carrera.index')
                            ->with('error', 'No se puede eliminar la carrera porque tiene mallas registradas.');
        }
        Carrera::destroy($codigo);

        return redirect()->route('carrera.index')->with('success', 'Carrera eliminada');
    }

}
