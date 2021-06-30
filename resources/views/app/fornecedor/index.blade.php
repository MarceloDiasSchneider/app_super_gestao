<?= '<h1>Fornecedores</h1>' ?>

{{-- Este é um comentario do Balde --}}

@php
    // dentro deste bloco posso ecrever php puro
    // echo '<p>Este testo é php com php</p>'
@endphp

{{-- {{ 'Este texto será sera exibido na pagina' }} --}}

{{-- Condicional do blade --}}
{{-- @if(count($fornecedores) > 0 && count($fornecedores) <= 10)
    <h1>Existem fornecedores cadastrados</h1>
@elseif(count($fornecedores) > 10)
    <h1>Existem muitos fornecedores cadastrados</h1>
@else
    <h1>Não existem fornecedores cadastrados</h1>
@endif --}}


{{-- Condicional de negação (!) do blade --}}
@foreach ( $fornecedores as $fornecedor )
    {{-- @dd($loop) --}}
    @if($loop->first)
        {{ 'Exibindo os fornecedores' }}
        <hr>
    @endif
    Posição: {{ $loop->iteration }}
    <br>
    @unless($fornecedor ['status'])
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        @isset($fornecedor['cnpj'])
            CNPJ: {{ $fornecedor['cnpj'] }}
            @empty( $fornecedor['cnpj'] )
                {{ 'Não informado' }}
            @endempty
        @endisset
        <br>
        {{ 'Região: ' }}
        @switch($fornecedor['ddd'])
            @case ('11')
                São Paulo (SP)
                @break
            @case ('54')
                Gramado (RS)
                @break
            @case ('51')
                Porto Alegre (RS)
                @break
            @default
                Região não identificada
        @endswitch
        <br>
        {{ 'Telefone: ' }}
        {{ $fornecedor['ddd'] ?? 'Não informado' }} {{ $fornecedor['telefone'] ?? 'Não informado' }}
    @endunless
    <hr>
    @if($loop->last)
        {{ 'Todos os ' . $loop->count . ' fornecedores' }}
    @endif
@endforeach

{{-- Depurando array e objetos com blade --}}
{{-- @dd($fornecedores) --}}
