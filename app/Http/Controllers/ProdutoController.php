<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
// use App\Models\Item;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // with(['produto_detalhe']) = "eager loading" = carregando produto detalhe junto com a chamada do produto
        $produtos = Produto::with(['produto_detalhe', 'fornecedor'])->paginate(10);
        // lazy loading = carregamento de produto detalhe somente acontece ao accesarmos o metodo -> produto_detalhe
        // $produtos = Produto::paginate(10);
        // utilizando model Item que não tem uma padronização como define a conveção do Laravel na nominação das trables e nos seus relacionamentos.
        // $produtos = Item::paginate(10);
        return view('app.produto.listar', compact('produtos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        # views create e edit com form como component
        return view('app.produto.create', compact('unidades', 'fornecedores'));
        # view de create e edit unificadas
        // return view('app.produto.create_edit', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'fornecedor_id' => 'exists:fornecedores,id',
            'nome' => 'required|min:3|max:100',
            'descricao' => 'required|min:5|max:750',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'fornecedor_id.exists' => 'Este fornecedor não é valido',
            'nome.min' => 'Nome deve ter ao menos 3 caracteres',
            'nome.max' => 'Nomo deve ter até 100 caracteres',
            'descricao.min' => 'Descrição deve ao menos 5 caracteres',
            'descricao.max' => 'Descrição deve ter até 750 caracteres',
            'peso.integer' => 'O peso deve ser um valor inteiro',
            'unidade_id.exists' => 'Esta unidade não é valida',
        ];
        $request->validate($regras, $feedback);
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        // $produto_detalhe = ProdutoDetalhe::where('produto_id', $produto->id)->get()->toArray();
        // $unidades = Unidade::all()->toArray();
        // $unidades = array_column($unidades, 'unidade', 'id');
        // return view('app.produto.show', compact('produto', 'produto_detalhe', 'unidades'));
        return view('app.produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        # views create e edit com form como component
        return view('app.produto.edit', compact('produto', 'fornecedores', 'unidades'));
        # view de create e edit unificadas
        // return view('app.produto.create_edit', compact('produto', 'unidades'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $regras = [
            'fornecedor_id' => 'exists:fornecedores,id',
            'nome' => 'required|min:3|max:100',
            'descricao' => 'required|min:5|max:750',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'fornecedor_id.exists' => 'Este fornecedor não é valido',
            'nome.min' => 'Nome deve ter ao menos 3 caracteres',
            'nome.max' => 'Nomo deve ter até 100 caracteres',
            'descricao.min' => 'Descrição deve ao menos 5 caracteres',
            'descricao.max' => 'Descrição deve ter até 750 caracteres',
            'peso.integer' => 'O peso deve ser um valor inteiro',
            'unidade_id.exists' => 'Esta unidade não é valida',
        ];
        $request->validate($regras, $feedback);

        $produto->update($request->all());
        return redirect()->route('produto.show', $produto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
