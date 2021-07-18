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
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
