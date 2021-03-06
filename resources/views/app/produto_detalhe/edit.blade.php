@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Editar detalhe do produto</p>
        </div>
        {{-- @component('app.produto._components.menu')
        @endcomponent --}}
        <div class="informacao-pagina">
            <div style="max-width: 550px; margin: auto;">
                <p> Produto original: {{ $produto_detalhe->produto->nome }} </p>
                <p> Descrição: {{ $produto_detalhe->produto->descricao }} </p>
                @component('app.produto_detalhe._components.from_create_edit', compact('produtos', 'produto_detalhe', 'unidades'))
                @endcomponent
            </div>
        </div>
    </div>
@endsection
