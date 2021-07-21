@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Listar cliente</p>
        </div>

        @component('app.cliente._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 750px; margin: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <p>
                        Listando {{ $clientes->count() }} de {{ $clientes->total() }} registros |
                        De {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }}
                    </p>
                    <tbody>
                        @foreach ($clientes as $cliente )
                            <tr>
                                <th>{{ $cliente->nome }}</th>
                                <th><a href="{{ route('cliente.show', $cliente->id) }}">Visualizar</a></th>
                                <th><a href="{{ route('cliente.edit', $cliente->id) }}">Editar</a></th>
                                <th>
                                    <form id="from_{{ $cliente->id }}" method="post" action="{{ route('cliente.destroy', $cliente->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.querySelector('#from_{{ $cliente->id }}').submit()">Excluir</a>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $clientes->appends($request->all())->links() }}
            </div>
        </div>
    </div>
@endsection
