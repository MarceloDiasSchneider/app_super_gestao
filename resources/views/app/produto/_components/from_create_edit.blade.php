 @if (isset($produto))
    <form method="post" action="{{ route('produto.update', $produto->id) }}">
        @method('PUT')
        <input type="hidden" name="id" value="{{ old('id') ?? $produto->id }}">
@else
    <form method="post" action="{{ route('produto.store') }}">
@endif
    @csrf
    <select name="fornecedor_id">
        <option selected>Selecione uma fornecedor</option>
        @foreach ($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}" {{ ( old('fornecedor_id') ?? ( isset( $produto->fornecedor_id ) ? $produto->fornecedor_id : '') ) == $fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome . " - " . $fornecedor->uf  }}</option>
        @endforeach
    <select>
    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}
    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ old('nome') ?? ( isset( $produto->nome ) ? $produto->nome : '') }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <input type="text" name="descricao" placeholder="Descrição" class="borda-preta" value="{{ old('descricao') ?? ( isset( $produto->descricao ) ? $produto->descricao : '') }}">
    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
    <input type="number" name="peso" placeholder="Peso" class="borda-preta" value="{{ old('peso') ?? ( isset( $produto->peso ) ? $produto->peso : '') }}">
    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
    <select name="unidade_id">
        <option selected>Selecione uma unidade</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ( old('unidade_id') ?? ( isset( $produto->unidade_id ) ? $produto->unidade_id : '') ) == $unidade->id ? 'selected' : '' }}>{{ $unidade->unidade . " - " . $unidade->descricao  }}</option>
        @endforeach
    <select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
