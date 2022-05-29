<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function home()
    {
        $usuarios = User::count();
        $cursos = Curso::count();
        $certificados = Certificado::count();
        return view('admin.home', compact('usuarios', 'cursos', 'certificados'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
