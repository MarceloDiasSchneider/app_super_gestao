@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Listar fornecedor</p>
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
                    <tbody>
                        @foreach ($fornecedores as $fornecedor )
                            <tr>
                                <th>{{ $fornecedor->nome }}</th>
                                <th>{{ $fornecedor->site }}</th>
                                <th>{{ $fornecedor->uf }}</th>
                                <th>{{ $fornecedor->email }}</th>
                                <th><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></th>
                                <th>excluir</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection