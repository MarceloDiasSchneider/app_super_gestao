@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Listar produtos</p>
        </div>

        @component('app.produto._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 750px; margin: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso|Unidade</th>
                            <th>Dimenção <span title="comprimento x largura x altura">&ii;</span></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <p>
                        Listando {{ $produtos->count() }} de {{ $produtos->total() }} registros |
                        De {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }}
                    </p>
                    <tbody>
                        @foreach ($produtos as $produto )
                            <tr>
                                <th>{{ $produto->nome }}</th>
                                <th>{{ $produto->descricao }}</th>
                                <th>{{ $produto->peso . ' ' . $unidades[$produto->unidade_id]}}</th>
                                @if (isset($produto->produto_detalhe))
                                    <th>{{
                                        $produto->produto_detalhe->comprimento . 'x' .
                                        $produto->produto_detalhe->largura . 'x' .
                                        $produto->produto_detalhe->altura . ' ' .
                                        $produto->produto_detalhe->unidade->unidade
                                    }}</th>
                                @else
                                    <th></th>
                                @endif
                                <th><a href="{{ route('produto.show', $produto->id) }}">Visualizar</a></th>
                                <th><a href="{{ route('produto.edit', $produto->id) }}">Editar</a></th>
                                <th>
                                    <form id="from_{{ $produto->id }}" method="post" action="{{ route('produto.destroy', $produto->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.querySelector('#from_{{ $produto->id }}').submit()">Excluir</a>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produtos->appends($request->all())->links() }}
            </div>
        </div>
    </div>
@endsection
