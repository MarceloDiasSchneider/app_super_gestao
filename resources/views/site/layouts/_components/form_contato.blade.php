<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="{{ $class }}">
    {{ $errors->first('nome') ? $errors->first('nome') : '' }}
    <br>
    <input type="text" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $class }}">
    {{ $errors->first('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" class="{{ $class }}">
    {{ $errors->first('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contatos_id" class="{{ $class }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($options_motivo_contato as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo }}</option>
        @endforeach
    </select>
    {{ $errors->first('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea class="{{ $class }}" name="mensagem" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    {{ $errors->first('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>
{{ $slot }}

{{-- @if(count(old()))
    @dd($errors->default->messages)
@endif --}}
{{-- Exibindo a variavel $errors --}}
@if($errors->any())
    <div style='position:absolute; top:0; left:0; width:100%; background:silver'>
        @foreach ($errors->all() as $key => $error)
            {{ $key }} =
            {{ $error }}
            <br>
        @endforeach
    </div>
@endif
