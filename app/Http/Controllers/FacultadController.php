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
            'codigo' => 'required|integer|unique:facultad,codigo',
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
        Facultad::destroy($codigo);
        return redirect()->route('facultad.index')->with('success', 'Facultad eliminada');
    }
}
