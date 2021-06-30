@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato',
                    [
                        'class' => 'borda-preta',
                        'options_motivo_contato' => $options_motivo_contato
                    ])
                    <p>A nossa equipe analizará a sua mensagem</p>
                    <p>Respondemos em até 24h</p>
                @endcomponent
            </div>
        </div>
    </div>
@endsection
