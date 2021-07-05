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
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        if ($metodo_autenticacao == 'padrao' && $perfil == 'visitante') {
            return Response('Acesso negado!');
        } elseif ($metodo_autenticacao == 'padrao' && $perfil == 'usuario') {
            // recebendo a resposta da aplicação e atribuindo a uma variavel
            $resposta = $next($request);

            // alterando o codigo http de resposta e a mensagem
            $resposta->setStatusCode(201, 'Status alterado');

            return $resposta;

        }
    }
}
