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
                        <td>{{ $produto->peso . ' ' . $unidades[$produto->unidade_id]}}</td>
                    </tr>
                    @if (isset($produto_detalhe[0]))
                        <tr>
                            <td>Comprimento</td>
                            <td>{{ $produto_detalhe[0]['comprimento'] . ' ' . $unidades[$produto_detalhe[0]['unidade_id']] }}</td>
                        </tr>
                        <tr>
                            <td>Largura</td>
                            <td>{{ $produto_detalhe[0]['largura'] . ' ' . $unidades[$produto_detalhe[0]['unidade_id']] }}</td>
                        </tr>
                        <tr>
                            <td>Altura</td>
                            <td>{{ $produto_detalhe[0]['altura'] . ' ' . $unidades[$produto_detalhe[0]['unidade_id']] }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection