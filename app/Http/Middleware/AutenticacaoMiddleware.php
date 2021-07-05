<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        session_start();

        if (isset($_SESSION['email'])) {
            return $next($request);
        } else {
            // $erro = ['erro' => 'sessão expidada: faça a autenticacao'];
            return redirect()->route('site.login', ['erro' => 'sessão expidada: faça a autenticação']);
        }
    }
}
