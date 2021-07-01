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
        $request->validate([
            // nome com no minimo 3 e maximo 50 caracteres
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required|min:10|max:20',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|min:15|max:750',
        ]);

        // inserindo os dados no banco de dados
        SiteContato::create($request->all());

        // redirecionando para outra pagina após a inserção dos dados
        return redirect()->route('site.index');
    }
}
