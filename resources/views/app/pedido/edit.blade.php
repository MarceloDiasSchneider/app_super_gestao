@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Editar pedido</p>
        </div>

        @component('app.pedido._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 550px; margin: auto;">
                @component('app.pedido._components.from_create_edit', compact('pedido', 'clientes'))
                @endcomponent
            </div>
        </div>
    </div>
@endsection
