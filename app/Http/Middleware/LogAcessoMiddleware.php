<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class LogAcessoMiddleware
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
        // visualizando os dados da requisição
        // dd($request);

        // armazenando as informações sobre a requisição
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['ip' => $ip, 'rota' => $rota]);
        // recebendo a requisição

        // continua a aplicação
        return $next($request);

        // retorna uma resposta personalizada
        // return Response('uma resposta generica');
    }
}
