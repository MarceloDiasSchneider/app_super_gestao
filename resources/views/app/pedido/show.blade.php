@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Ver pedido</p>
        </div>

        @component('app.pedido._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 550px; margin: auto;">
                <table border="1" style="text-align: left; min-width: 350px;">
                    <tr >
                        <td>ID</td>
                        <td>{{ $pedido->id }}</td>
                    </tr>
                    <tr>
                        <td>Cliente</td>
                        <td>{{ $pedido->cliente_id }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
