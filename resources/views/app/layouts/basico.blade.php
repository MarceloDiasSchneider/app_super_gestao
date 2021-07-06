<!DOCTYPE html>
<html lang="pt-br">
    <head>
        {{-- @yield('name') é uma variavel que recebe dados definidos com @section('name', data) --}}
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        @include('app.layouts._partials.topo')
        @yield('conteudo')
    </body>
</html>
