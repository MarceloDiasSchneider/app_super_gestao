@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Listar pedido</p>
        </div>

        @component('app.pedido._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 750px; margin: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Numero do pedido</th>
                            <th>Cliente</th>
                            <th colspan="3">Ações</th>
                        </tr>
                    </thead>
                    <p>
                        Listando {{ $pedidos->count() }} de {{ $pedidos->total() }} registros |
                        De {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }}
                    </p>
                    <tbody>
                        @foreach ($pedidos as $pedido )
                            <tr>
                                <th>{{ $pedido->id }}</th>
                                <th>{{ $pedido->cliente_id }}</th>
                                <th><a href="{{ route('pedido.show', $pedido->id) }}">Visualizar</a></th>
                                <th><a href="{{ route('pedido.edit', $pedido->id) }}">Editar</a></th>
                                <th>
                                    <form id="from_{{ $pedido->id }}" method="post" action="{{ route('pedido.destroy', $pedido->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.querySelector('#from_{{ $pedido->id }}').submit()">Excluir</a>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pedidos->appends($request->all())->links() }}
            </div>
        </div>
    </div>
@endsection
