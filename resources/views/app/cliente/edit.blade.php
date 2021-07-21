@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Editar cliente</p>
        </div>

        @component('app.cliente._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 550px; margin: auto;">
                @component('app.cliente._components.from_create_edit', compact('cliente'))
                @endcomponent
            </div>
        </div>
    </div>
@endsection
