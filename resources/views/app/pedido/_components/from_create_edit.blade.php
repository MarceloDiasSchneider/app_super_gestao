@if (isset($pedido))
    <form method="post" action="{{ route('pedido.update', $pedido->id) }}">
        @method('PUT')
        <input type="hidden" name="id" value="{{ old('id') ?? $pedido->id }}">
@else
    <form method="post" action="{{ route('pedido.store') }}">
@endif
    @csrf
    <select name="cliente_id">
        <option selected>Selecione um cliente</option>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ ( old('cliente_id') ?? ( isset( $pedido->cliente_id ) ? $pedido->cliente_id : '') ) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
        @endforeach
    <select>
    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
