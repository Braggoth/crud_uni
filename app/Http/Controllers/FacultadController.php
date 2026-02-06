<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    public function index()
    {
        $facultades = Facultad::all();
        return view('facultad.index', compact('facultades'));
    }

    public function create()
    {
        return view('facultad.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50'
        ]);

        Facultad::create($request->all());

        return redirect()->route('facultad.index')->with('success', 'Facultad creada');
    }

    public function edit($codigo)
    {
        $facultad = Facultad::findOrFail($codigo);
        return view('facultad.edit', compact('facultad'));
    }

    public function update(Request $request, $codigo)
    {
        $request->validate([
            'nombre' => 'required|string|max:50'
        ]);

        $facultad = Facultad::findOrFail($codigo);
        $facultad->update($request->all());

        return redirect()->route('facultad.index')->with('success', 'Facultad actualizada');
    }

    public function destroy($codigo)
    {
        // Verificar si hay carreras asociadas
        $carreras = \DB::table('carrera')->where('facultad', $codigo)->count();

        if ($carreras > 0) {
            return redirect()->route('facultad.index')
                            ->with('error', 'No se puede eliminar la facultad porque tiene carreras asociadas.');
        }

        // Verificar si hay mallas asociadas
        $mallas = \DB::table('malla')->where('facultad', $codigo)->count();

        if ($mallas > 0) {
            return redirect()->route('facultad.index')
                            ->with('error', 'No se puede eliminar la facultad porque tiene mallas asociadas.');
        }

        Facultad::destroy($codigo);

        return redirect()->route('facultad.index')->with('success', 'Facultad eliminada');
    }



}
