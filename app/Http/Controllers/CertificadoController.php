<?php

namespace App\Http\Controllers;

use App\Imports\CertificadosImport;
use App\Models\{Certificado, Curso, User};
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Shuchkin\SimpleXLSX;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificadoController extends Controller
{
    public function carga()
    {
        return view('certificados.carga');
    }

    public function carga_post(Request $request)
    {
        $file = $request->file('certificados');
        $archivo = $this->upload_global($file, 'excels_certificados');

        if ($xlsx = SimpleXLSX::parse('uploads/excels_certificados/' . $archivo)) {
            $array = $xlsx->rows();
        } else {
            echo SimpleXLSX::parseError();
        }
        $i = 0;
        $c = 0;
        $n = 0;
        foreach ($array as $row) {
            $i++;
            if ($i > 8) {
                $curso = Curso::where('convocatoria', $row[3])->first();
                $user = User::whereDni($row[1])->count();

                if ($curso != null) {
                    if ($user > 0) {
                        $user = User::whereDni($row[1])->first();
                    } else {
                        $user = User::create([
                            'nombre' => $row[2],
                            'usuario' => str_replace(" ", "", $row[2]),
                            'rol_id' => 2,
                            'dni' => $row[1],
                            'clave' => sha1($row[1]),
                            'estado' => 1
                        ]);
                    }

                    $val =
                        Certificado::updateOrCreate([
                            'idUsuario' => $user->id,
                            'idCurso' => $curso->id
                        ]);
                    $c++;
                } else {
                    $n++;
                }
            }
        }

        return redirect()->route('certificados')
            ->with([
                'success' => $c . ' Certificados cargados con exito',
                'danger' => $n . ' Certificados no cargados (No existe la convocatoria)'
            ]);
    }

    public function index()
    {
        $certificados = Certificado::with(['usuario', 'curso'])->get();


        return view('certificados.list', compact('certificados'));
    }

    public function destroy(Certificado $certificado)
    {
        $certificado->delete();

        return back()->with('success', 'Certificado eliminado con exito');
    }

    public function index_usu($dni)
    {
        $usuario = User::whereDni($dni)->first();
        if ($usuario != null) {
            $certificados = Certificado::where('idUsuario', $usuario->id)->with(['curso'])->get();
            $total = $certificados->count();
            $html = "";

            foreach ($certificados as $certificado) {
                $html .= "<tr>";
                $html .= "<td>" . $certificado->curso->curso . "</td>";
                $html .= "<td> <a href='#' onclick='verCertificado($certificado->id)'> Descargar <i class='fa fa-eye'></i></a></td>";
                $html .= "</tr>";
            }

            return response()->json([
                'usuario' => $usuario,
                'certificados' => $certificados,
                'total' => $total,
                'html' => $html
            ]);
        } else {

            return response()->json([
                'usuario' => "",
                'certificados' => "",
                'total' => 0,
                'html' => ""
            ]);
        }
    }

    public function getCertificado($certificado)
    {
        $certificado = Certificado::whereId($certificado)->with(['curso', 'usuario'])->first();
        return response()->json([
            'certificado' => $certificado,
        ]);
    }

    public function pdf($certificado)
    {

        $certificado = Certificado::with(['curso', 'usuario'])->whereId($certificado)->first();
        $ruta = public_path() . '/uploads/imagenes_cursos/' . $certificado->curso->imagen;
        $ruta = route('verificarCertificado', $certificado->id);
        $imagen = public_path('/uploads/imagenes_cursos/' . $certificado->curso->imagen);
        //$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($ruta));
        $pdf = \PDF::loadView('certificados.certificado', compact('certificado', 'ruta', 'imagen'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->render();

        return $pdf->download($certificado->curso->convocatoria . '-' . $certificado->usuario->dni . '.pdf');
    }

    public function png($certificado)
    {
        $certificado = Certificado::with(['curso', 'usuario'])->whereId($certificado)->first();
        $ruta = public_path() . '/uploads/imagenes_cursos/' . $certificado->curso->imagen;


        $rutaFuente = asset('storage/fonts/Roboto-Bold.ttf');
        $nombreImagen = 'http://localhost:8000/uploads/imagenes_cursos/' . $certificado->curso->imagen;
        $imagen = imagecreatefromjpeg($nombreImagen);
        $color = imagecolorallocate($imagen, 0, 0, 0);
        $tamanio = 20;
        $angulo = 0;
        $x = 400;
        $y = 50;
        $nombre = $certificado->usuario->nombre;
        imagettftext($imagen, $tamanio, $angulo, $x, $y, $color, $rutaFuente, $texto);
        header("Content-Type: image/png");
        imagepng($imagen);
        imagedestroy($imagen);
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
