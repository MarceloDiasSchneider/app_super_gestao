@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Adicionar produto</p>
        </div>
        @component('app.produto._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 550px; margin: auto;">
                @component('app.produto._components.from_create_edit', compact('fornecedores', 'unidades'))
                @endcomponent
            </div>
        </div>
    </div>
@endsection
