<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        return view('app.produto.index', compact('produtos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', compact('unidades'));
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
            'nome' => 'required|min:3|max:100',
            'descricao' => 'required|min:5|max:750',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
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
        $unidades = Unidade::all()->toArray();
        $unidades = array_column($unidades, 'unidade', 'id');
        return view('app.produto.show', compact('produto', 'unidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
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
        echo 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        // $produto->find($produto)->delete();
        echo 'destroy';
        // return redirect()->route('poduto.index');
    }
}
