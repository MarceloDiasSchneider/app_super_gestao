<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('app.fornecedor.index', compact('fornecedores'));
    }

    public function listar(Request $request)
    {
        $request_all = $request->all();
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->nome.'%' )
            ->where('site', 'like', '%'.$request->site.'%' )
            ->where('uf', 'like', '%'.$request->uf.'%' )
            ->where('email', 'like', '%'.$request->email.'%' )
            ->paginate(4);

        return view('app.fornecedor.listar', compact('fornecedores', 'request_all'));
    }

    public function adicionar(Request $request)
    {
        $mensagem = '';
        $id = $request->input('id');
        # validação dos dados
        if ($request->input('_token') != '' ) {
            $validacao = [
                'nome' => 'required|min:3|max:50',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'required|email',
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O :attribute deve ter mais de 3 caracteres',
                'nome.max' => 'O :attribute deve ter até 50 caracteres',
                'uf.min' => 'O :attribute deve ter 2 caracteres',
                'uf.max' => 'O :attribute deve ter 2 caracteres',
                'email.email' => 'O :attribute não é valido',
            ];
            $request->validate($validacao, $feedback);

            if ($id == '') {
                # inserção no banco de dados
                Fornecedor::create($request->all());
                # define a mensagem de sucesso
                $mensagem = 'cadastrado';
            } else {
                # atualização no banco de dados
                $fornecedor = Fornecedor::find($id);
                $update = $fornecedor->update($request->all());

                # define a mensagem de sucesso
                if ($update) {
                    $mensagem = 'atualizado';
                } else {
                    $mensagem = 'erro';
                }
                # retornando para editar
                return redirect()->route('app.fornecedor.editar', compact('id','mensagem'));
            }

        }

        return view('app.fornecedor.adicionar', compact('mensagem'));
    }

    public function editar($id, $mensagem = '')
    {
        $fornecedor = Fornecedor::find($id);

        # utilizando a view adicionar para editar
        return view('app.fornecedor.adicionar', compact('fornecedor', 'mensagem'));

    }

    public function excluir($id)
    {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor.listar');
    }
}
