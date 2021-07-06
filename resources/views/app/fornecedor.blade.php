@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Fornecedor</h1>
            <?=  print_r($fornecedores) ?>
        </div>
    </div>
@endsection
