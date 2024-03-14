<?php

namespace App\Http\Controllers;

//Modelo: Declaracion de la tabla a usar, como sus relaciones polimormicas

use App\Imports\UsuariosImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function login_post(Request $request)
    {

        $val = User::whereUsuario($request->usu_correo)->whereClave(sha1($request->usu_pass))->count();
        if ($val > 0) {
            $user = User::whereUsuario($request->usu_correo)->whereClave(sha1($request->usu_pass))->first();

            Auth::loginUsingId($user->id);
            return redirect()->route('home');
        } else {
            return back()->with('danger', 'Su Usuario no existe');
        }
    }


    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.list', compact('usuarios'));
    }

    public function store(Request $request)
    {
        //create: Funcion propia de laravel, un metodo relacion al modelo

        //lo que estan dentro de comillas '', son el nombre del campo en la tabla
        //el array $request es como en php $_POST, o se asume como el form-data de la peticion
        //para recorrer el array $_POST['valor'] ahora funciona orientado a objeto
        //el array se recorre apuntando al valor de la peticion si tienes un campo de name='valor'
        //para usarlo deberas usar $request->valor

        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'usuario' => $request->usuario,
            'sexo' => $request->sexo,
            'telefono' => $request->telefono,
            'rol_id' => $request->rol_id,
            'dni' => $request->dni,
            'clave' => sha1($request->clave),
            'estado' => 1
        ]);

        //back es un metodo propio de laravel que te retorna a la url anterior
        //se usa cuando el registro o modificacion es atravez de un modal
        //with es un metodo propio de laravel que permite manejar mensajes flash de sesiones
        //es como si en php usaras $_SESSION[''] solo que es un unico uso
        return back()->with('success', 'Usuario registrado con exito');
    }

    public function edit(User $usuario)
    {
        return response()->json([
            'usuario' => $usuario
        ]);
    }

    public function update(Request $request)
    {
        $usuario = User::updateOrCreate(
            [
                'id' => $request->idUsuario
            ],
            [
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'correo' => $request->correo,
                'usuario' => $request->usuario,
                'sexo' => $request->sexo,
                'telefono' => $request->telefono,
                'rol_id' => $request->rol_id,
                'dni' => $request->dni,
            ]
        );

        if($request->clave != null)
        {
            $usuario->clave = sha1($request->clave);
            $usuario->save();
        }

        return back()->with('success', 'Usuario actualizado con exito');
    }

    //funciones existe una forma de busqueda rapida
    public function destroy(User $usuario)
    {
        //el metodo delete es propio de laravel y te permite eliminar el registro
        $usuario->delete();

        return back()->with('success', 'Usuario eliminado con exito');
    }

    public function carga()
    {
        return view('usuarios.carga');
    }

    public function carga_post( Request $request )
    {
        $file = $request->file('usuarios');
        $archivo = $this->upload_global($file, 'excels_usuarios');

        Excel::import(new UsuariosImport, 'uploads/excels_usuarios/' . $archivo);

        return redirect()->route('usuarios')->with('success', 'Carga realizada con exito');
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
