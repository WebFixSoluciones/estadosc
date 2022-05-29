<?php

namespace App\Http\Controllers;

use App\Imports\CursosImport;
use App\Models\CategoriaCurso;
use App\Models\Curso;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        $categorias = CategoriaCurso::all();
        return view('curso.list', compact('cursos', 'categorias'));
    }

    public function store( Request $request )
    {
        $file = $request->file('imagen');
        $curso = Curso::create([
            'idCategoria' => $request->idCategoria,
            'curso' => $request->curso,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_fin,
            'imagen' => $this->upload_global($file, 'imagenes_cursos'),
            'convocatoria' => $request->convocatoria
        ]);

        return back()->with('success', 'Curso registrado con exito');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return back()->with('success', 'Curso eliminado con exito');
    }


    public function edit(Curso $curso)
    {
        return response()->json([
            'curso' => $curso
        ]);
    }

    public function update(Request $request)
    {
        $curso = Curso::updateOrCreate([
            'id' => $request->idCurso
        ],
        [
                'curso' => $request->curso,
                'descripcion' => $request->descripcion,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_final' => $request->fecha_fin,
                'convocatoria' => $request->convocatoria
        ]
        );

        return back()->with('success', 'Curso actualizado con exito');
    }

    public function carga()
    {
        return view('curso.carga');
    }

    public function cargaStore(Request $request)
    {
        $file = $request->file('cursos');
        $archivo = $this->upload_global($file, 'excels_cursos');

        Excel::import(new CursosImport, 'uploads/excels_cursos/' . $archivo);

        return redirect()->route('cursos')->with('success', 'Carga realizada con exito');
    }


    function upload_global($file, $folder)
    {

        $file_type = $file->getClientOriginalExtension();
        $folder = $folder;
        $destinationPath = public_path() . '/uploads/' . $folder;
        $destinationPathThumb = public_path() . '/uploads/' . $folder . 'thumb';
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $url = '/uploads/' . $folder . '/' . $filename;

        if ($file->move($destinationPath . '/', $filename)) {
            return $filename;
        }
    }


}
