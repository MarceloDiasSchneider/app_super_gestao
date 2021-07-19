@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Listar fornecedores</p>
        </div>

        @component('app.fornecedor._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 750px; margin: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <p>
                        Listando {{ $fornecedores->count() }} de {{ $fornecedores->total() }} registros |
                        De {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }}
                    </p>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor )
                            <tr>
                                <th>{{ $fornecedor->nome }}</th>
                                <th>{{ $fornecedor->site }}</th>
                                <th>{{ $fornecedor->uf }}</th>
                                <th>{{ $fornecedor->email }}</th>
                                <th><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></th>
                                <th><a href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></th>
                            </tr>
                            @foreach ($fornecedor->produtos as $produto )
                                @if ($loop->first)
                                    <th colspan="6">Produtos relacionados
                                        <table border="1" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Descricao</th>
                                                    <th>Peso</th>
                                                    <th>Dimenção</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                @endif
                                                <tr>
                                                    <th>{{ $produto->nome }}</th>
                                                    <th>{{ $produto->descricao }}</th>
                                                    <th>{{ $produto->peso . ' ' . $produto->unidade->unidade }}</th>
                                                    @if (isset($produto->produto_detalhe))
                                                        <th>{{
                                                            $produto->produto_detalhe->comprimento . 'x' .
                                                            $produto->produto_detalhe->largura . 'x' .
                                                            $produto->produto_detalhe->altura . ' ' .
                                                            $produto->produto_detalhe->unidade->unidade
                                                        }}</th>
                                                    @endif
                                                </tr>
                                    @if ($loop->last)
                                            </tbody>
                                        </table>
                                    @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                {{ $fornecedores->appends($request->all())->links() }}
            </div>
        </div>
    </div>
@endsection
