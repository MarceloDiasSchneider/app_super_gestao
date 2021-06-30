<!DOCTYPE html>
<html lang="pt-br">
    <head>
        {{-- @yield('name') é uma variavel que recebe dados definidos com @section('name', data) --}}
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        @include('site.layouts._parcial.topo')
        @yield('conteudo')
        @include('site.layouts._parcial.rodape')
    </body>
</html>
