<?php

namespace App\Http\Controllers;

use App\Imports\CategoriasImport;
use App\Models\CargaCategorias;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CargaCategoriasController extends Controller
{
    public function index()
    {
        return view('categorias.carga');
    }


    public function store(Request $request)
    {
        $file = $request->file('categorias');
        $carga = CargaCategorias::create([
            'archivo' => $this->upload_global($file, 'excels_categorias')
        ]);

        Excel::import(new CategoriasImport, 'uploads/excels_categorias/'.$carga->archivo);

        return redirect()->route('categorias')->with('success', 'Carga realizada con exito');
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
