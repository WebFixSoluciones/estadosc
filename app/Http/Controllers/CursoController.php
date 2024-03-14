<?php

namespace App\Http\Controllers;

use App\Models\{CategoriaCurso, Certificado, Curso, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shuchkin\SimpleXLSX;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::withCount('certificados')->get();
        $categorias = CategoriaCurso::all();

        $ruta = route('deleteCurso');

        return view('curso.list', compact('cursos', 'categorias', 'ruta'));
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

        return back()->with('success', 'Estados registrados con exito');
    }

    public function destroy(Curso $curso)
    {
        $certificados = Certificado::where('idCurso', $curso->id)->get();
        $count = Certificado::where('idCurso', $curso->id)->count();

        foreach ($certificados as $certificado) {
            DB::table('certificados')->delete($certificado->id);
        }

        $curso->delete();


        return back()->with('success', '1 Estado y '.$count.' Estado de Cuenta eliminado con exito');
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

        if ($xlsx = SimpleXLSX::parse('uploads/excels_cursos/' . $archivo)) {
            $array = $xlsx->rows();
        } else {
            echo SimpleXLSX::parseError();
        }


        $i = 0;

        foreach ($array as $row) {
            $i++;
            if ($i > 1) {
                $curso =
                    Curso::create([
                        'idCategoria' => $row[1],
                        'curso' => $row[2],
                        'descripcion' => $row[3],
                        'fecha_inicio' => $row[4],
                        'fecha_final' => $row[5],
                        'convocatoria' => $row[6],
                    ]);
            }
        }


        //Excel::import(new CursosImport, 'uploads/excels_cursos/' . $archivo);

        return redirect()->route('cursos')->with('success', 'Carga realizada con exito');
    }

    public function updateImagenCurso( Request $request )
    {
        $curso = Curso::find($request->idCurso);
        $file = $request->file('imagen');
        $curso->imagen = $this->upload_global($file, 'imagenes_cursos');
        $curso->save();

        return back()->with('success', 'Actuaizacion de imagen realizada con exito');
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
