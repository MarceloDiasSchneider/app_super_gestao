<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato()
    {
        $options_motivo_contato = MotivoContato::all();

        // titulo da pagina enviado ao componente
        $titulo = 'Contato';
        return view('site.contato', compact('titulo', 'options_motivo_contato'));
    }

    public function formasDeRecuperarDadosDoFormulario()
    {
        /*
        // definindo os atributos da model SiteContato de forma individual
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        // salvando no banco de dados
        $contato->save();
        */

        // definindo os atributos da model SiteContato com metodo fill()
        /*
        $contato = new SiteContato();
        $contato->fill($request->all());
        // salvando no banco de dados
        $contato->save();
        */

        // definindo os atributos da model SiteContato e já salvando no banco de dados com o metodo estatico create()
        /*
        $contato = new SiteContato();
        $contato->create($request->all());
        */

        // Uma forma muito pratica de inserir o registro
        // SiteContato::create($request->all());
    }

    public function salvar(Request $request)
    {
        // validando os dados do formulario
        $validacao = [
            // nome com no minimo 3 e maximo 50 caracteres
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required|min:10|max:20',
            // unique:table | unique irá buscar na table informada, buscando na coluna com o mesmo nome da chave do array | select email from site_contatos
            'email' => 'required|email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|min:15|max:750',
        ];
        $feedback = [
            // aplicando em todos os campos con required
            'required' => 'O campo :attribute é obrigatorio',

            'nome.min' => 'O nome deve conter mais de 3 caracteres',
            'nome.max' => 'O nome deve conter até 50 caracteres',
            'telefone.min' => 'O telefone deve conter mais de 10 caracteres',
            'telefone.max' => 'O telefone deve conter até 20 caracteres',
            'email.email' => 'O email informado não é valido',
            'email.unique' => 'O email informado já esta registrado',
            'mensagem.min' => 'A mensagem deve conter mais de 15 caracteres',
            'mensagem.max' => 'A mensagem deve conter até 750 caracteres',
        ];
        $request->validate( $validacao, $feedback);

        // inserindo os dados no banco de dados
        SiteContato::create($request->all());

        // redirecionando para outra pagina após a inserção dos dados
        return redirect()->route('site.index');
    }
}
