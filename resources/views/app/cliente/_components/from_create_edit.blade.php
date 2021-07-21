 @if (isset($cliente))
    <form method="post" action="{{ route('cliente.update', $cliente->id) }}">
        @method('PUT')
        <input type="hidden" name="id" value="{{ old('id') ?? $cliente->id }}">
@else
    <form method="post" action="{{ route('cliente.store') }}">
@endif
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ old('nome') ?? ( isset( $cliente->nome ) ? $cliente->nome : '') }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
