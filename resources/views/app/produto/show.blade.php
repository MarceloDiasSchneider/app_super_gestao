@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Ver produto</p>
        </div>

        @component('app.produto._components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style="max-width: 550px; margin: auto;">
                <table style="text-align: left; border: 1px solid silver">
                    <tr style="border: 1px solid black">
                        <td style="border: 1px solid black">ID</td>
                        <td style="border: 1px solid black">{{ $produto->id }}</td>
                    </tr>
                    <tr style="border: 1px solid black">
                        <td style="border: 1px solid black">Nome</td>
                        <td style="border: 1px solid black">{{ $produto->nome }}</td>
                    </tr>
                    <tr style="border: 1px solid black">
                        <td style="border: 1px solid black">Peso</td>
                        <td style="border: 1px solid black">{{ $produto->peso . ' ' . $unidades[$produto->unidade_id]}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
