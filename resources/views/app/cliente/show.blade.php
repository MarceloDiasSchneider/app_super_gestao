@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Ver cliente</p>
        </div>

        @component('app.cliente._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 550px; margin: auto;">
                <table border="1" style="text-align: left; width: 100%; min-width: 350px;">
                    <tr >
                        <td>ID</td>
                        <td>{{ $cliente->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $cliente->nome }}</td>
                    </tr>
                </table>
                <table border="1" style="text-align: left; width: 100%; min-width: 350px;">
                    @foreach ($cliente->pedidos_do_cliente as $pedido)
                        <tr>
                            <td>Pedido</td>
                            <td><a href="{{ route('pedido.show', compact('pedido')) }}">{{ $pedido->id }}</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
