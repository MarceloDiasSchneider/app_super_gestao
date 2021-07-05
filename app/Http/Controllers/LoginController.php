<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = $request->get('erro');
        $titulo = 'Login';
        return view('site.login', compact('titulo', 'erro'));
    }

    public function autenticar(Request $request)
    {
        // regras de validação
        $validacao = [
            'email' => 'required|email',
            'password' => 'required|min:4|max:10',
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatorio',
            'email.email' => 'O email informado não é valido',
            'password.required' => 'O campo senha é obrigatorio',
            'password.min' => 'A senha deve conter mais de 3 caracteres',
            'password.max' => 'A senha deve conter até 10 caracteres',
        ];
        $request->validate($validacao, $feedback);

        /*
        $usuario = User::where('email', $request->email)
            ->where('password', $request->password)
            ->get()
            ->first();

        if (isset($usuario->name)) {
            return 'Autenticando';
        } else {
            return 'Usuario não encontrado';
        }
        */
        $usuario = User::where('email', $request->email)
            ->get()
            ->first();
        if (!isset($usuario->name)) {
            return redirect()->route('site.login', ['erro' => 'email não cadastrado']);
        } elseif ($usuario->password !== $request->password) {
            return redirect()->route('site.login', ['erro' => 'senha não confere']);
        }

        session_start();
        $_SESSION['name'] = $usuario->name;
        $_SESSION['email'] = $usuario->email;

        return redirect()->route('app.fornecedores');
    }
}
