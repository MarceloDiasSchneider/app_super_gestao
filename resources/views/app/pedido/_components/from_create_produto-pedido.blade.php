<form method="post" action="{{ route('pedido-produto.store', compact('pedido')) }}">
    @csrf
    <select name="produto_id">
        <option selected>Selecione um produto</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ old('produto_id') }}>{{ $produto->nome }}</option>
        @endforeach
    <select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
