@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Adicionar detalhe do produto</p>
        </div>
        {{-- @component('app.produto._components.menu')
        @endcomponent --}}
        <div class="informacao-pagina">
            <div style="max-width: 550px; margin: auto;">
                @component('app.produto_detalhe._components.from_create_edit', compact('produtos', 'unidades'))
                @endcomponent
            </div>
        </div>
    </div>
@endsection
