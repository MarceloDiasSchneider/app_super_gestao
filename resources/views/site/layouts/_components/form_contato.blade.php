<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" name="nome" placeholder="Nome" class="{{ $class }}">
    <br>
    <input type="text" name="telefone" placeholder="Telefone" class="{{ $class }}">
    <br>
    <input type="email" name="email" placeholder="E-mail" class="{{ $class }}">
    <br>
    <select name="motivo_contato" class="{{ $class }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea class="{{ $class }}" name="mensagem" placeholder="Preencha aqui a sua mensagem"></textarea>
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>
{{ $slot }}

{{-- Exibindo a variavel $errors --}}
<div style='position:absolute; top:0; left:0; width:100%; background:silver'>
    <pre>
    {{ print_r($errors) }}
    </pre>
</div>
