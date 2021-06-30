<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="{{ $class }}">
    <br>
    <input type="text" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $class }}">
    <br>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" class="{{ $class }}">
    <br>
    <select name="motivo_contato" class="{{ $class }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($options_motivo_contato as $key => $motivo_contato)
            <option value="{{ $key }}" {{ old('motivo_contato') == $key ? 'selected' : '' }}>{{ $motivo_contato['motivo'] }}</option>
        @endforeach
    </select>
    <br>
    <textarea class="{{ $class }}" name="mensagem" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>
{{ $slot }}

{{-- Exibindo a variavel $errors --}}
{{-- <div style='position:absolute; top:0; left:0; width:100%; background:silver'>
    <pre>
    {{ print_r($errors) }}
    </pre>
</div> --}}
