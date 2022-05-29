<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaCursoRequest;
use App\Http\Requests\UpdateCategoriaCursoRequest;
use App\Models\CategoriaCurso;
use Illuminate\Http\Request;

class CategoriaCursoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaCurso::all();
        return view('categorias.list', compact('categorias'));
    }

    public function store(Request $request)
    {
        $categoria = CategoriaCurso::create([
            'categoria' => $request->categoria
        ]);

        return back()->with('success', 'Categoria registrada con exito');
    }

    public function edit(CategoriaCurso $categoriaCurso)
    {
        return response()->json([
            'categoria' => $categoriaCurso
        ]);
    }

    public function update(Request $request)
    {
        $categoria = CategoriaCurso::updateOrCreate(
            [
                'id' => $request->idCategoria
            ],
            [
                'categoria' => $request->categoria
            ]
        );

        return back()->with('success', 'Categoria actualizada con exito');
    }

    public function destroy(CategoriaCurso $categoriaCurso)
    {
        $categoriaCurso->delete();

        return back()->with('success', 'Categoria eliminada con exito');
    }
}
