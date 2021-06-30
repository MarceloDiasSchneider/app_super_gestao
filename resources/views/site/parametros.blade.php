<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Principal</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div>
            <ul>
                <!-- utilizando route() para identificar a rota pelo ->nome() -->
                <li><a href="{{ route('site.index') }}">Home</a></li>
                <li><a href="{{ route('site.sobre-nos') }}">Sobre nós</a></li>
                <li><a href="{{ route('site.contato') }}">Contato</a></li>
                <li><a href="{{ route('site.login') }}">Login</a></li>
            </ul>
        </div>
        <h1>Principal</h1>
        <p>X = {{ $p1 }}</p>
        <p>Y = {{ $p2 }}</p>
        <p>A soma entre {{ $p1 }} e {{ $p2 }} é {{ $p1 + $p2 }}</p>
    </body>
</html>
