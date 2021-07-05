@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="max-width:300px; margin:auto;">
                <form action="{{ route('site.login') }}" method="post">
                    @csrf
                    <input type="text" name="email" placeholder="e-mail" class="botda-preta" value="{{ old('email') }}">
                    {{ $errors->first('email') ? $errors->first('email') : '' }}
                    <input type="password" name="password" placeholder="senha" class="botda-preta" value="{{ old('password') }}">
                    {{ $errors->first('password') ? $errors->first('password') : '' }}
                    {{ isset($erro) ? $erro : '' }}
                    <button type="submit" class="botda-preta">Entrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
