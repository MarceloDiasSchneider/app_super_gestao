@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Ver produto</p>
        </div>
        {{-- @dd($produto_detalhe) --}}
        @component('app.produto._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 550px; margin: auto;">
                <table border="1" style="text-align: left; min-width: 350px;">
                    <tr >
                        <td>Fornecedor</td>
                        <td>{{ $produto->fornecedor->nome }}</td>
                        <td><a href="{{ route('app.fornecedor.listar', [ 'nome' => $produto->fornecedor->nome]) }}">Visualizar</a></td>
                    </tr>
                </table>
                <table border="1" style="text-align: left; min-width: 350px;">
                    <tr >
                        <td>ID</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td>{{ $produto->peso . ' ' . $produto->unidade->unidade}}</td>
                    </tr>
                    @if (isset($produto->produto_detalhe))
                        <tr>
                            <td>Comprimento</td>
                            <td>{{ $produto->produto_detalhe->comprimento . ' ' . $produto->produto_detalhe->unidade->unidade }}</td>
                        </tr>
                        <tr>
                            <td>Largura</td>
                            <td>{{ $produto->produto_detalhe->largura . ' ' . $produto->produto_detalhe->unidade->unidade }}</td>
                        </tr>
                        <tr>
                            <td>Altura</td>
                            <td>{{ $produto->produto_detalhe->altura . ' ' . $produto->produto_detalhe->unidade->unidade }}</td>
                        </tr>
                        <tr>
                            <td>Unidade de medida</td>
                            <td>{{ $produto->produto_detalhe->unidade->unidade . ' - ' . $produto->produto_detalhe->unidade->descricao }}</td>
                        </tr>
                        <tr>
                            <td>Editar detalhe do produto</td>
                            <th><a href="{{ route('produto-detalhe.edit', $produto->produto_detalhe->id) }}">Editar</a></th>
                            {{-- <td>
                                <form id="from_{{ $$produto->produto_detalhe-> }}" method="post" action="{{ route('produto-detalhe.destroy'), $$produto->produto_detalhe->}}">
                                    @csrf
                                    @method('DELETE')

                            </td> --}}
                        </tr>
                    @else
                        <tr>
                            <td>Adicionar detalhe do produto</td>
                            <th><a href="{{ route('produto-detalhe.create', $produto->id) }}">Adicionar</a></th>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
