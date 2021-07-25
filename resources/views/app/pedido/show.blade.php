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
                <table border="1" style="text-align: left; width: 100%; min-width: 350px;">
                    <tr >
                        <td>ID</td>
                        <td colspan="2">{{ $pedido->id }}</td>
                    </tr>
                    <tr>
                        <td>Cliente</td>
                        <td>{{ $pedido->cliente->nome }}</td>
                        <td><a href="{{ route('cliente.show', ['cliente' => $pedido->cliente]) }}">{{ $pedido->cliente->id }}</a></td>
                    </tr>
                </table>
                <table border="1" style="text-align: left; width: 100%; min-width: 350px;">
                    <tr>
                            <td>Produto</td>
                            <td>Quantidade</td>
                            <td>Adicionado em</td>
                            <td>Ver pedido</td>
                    </tr>
                    @foreach ($pedido->produtos_do_pedido as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                            <td><a href="{{ route('produto.show', compact('produto')) }}">{{ $produto->id }}</a></td>
                        </tr>
                    @endforeach
                </table>
                @component('app.pedido._components.from_create_produto-pedido', compact('pedido', 'produtos'))
                @endcomponent
            </div>
        </div>
    </div>
@endsection
