<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutoDetalhe;
use App\Models\Produto;
use App\Models\Unidade;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', compact('produtos', 'unidades'));
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
            'produto_id' => 'exists:produtos,id',
            'comprimento' => 'required|integer',
            'largura' => 'required|integer',
            'altura' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];
        $feedback = [
            'produto_id.exists' => 'Este produto não é valido',
            'required' => 'O campo :attribute deve ser preenchido',
            'integer' => 'O :attribute deve ser um valor inteiro',
            'unidade_id.exists' => 'Esta unidade não é valida',
        ];
        $request->validate($regras, $feedback);
        ProdutoDetalhe::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function show($produto_detalhe)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        $produtos = Produto::all();
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', compact('produtos', 'produto_detalhe', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdutoDetalhe  $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProdutoDetalhe $produto_detalhe)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'comprimento' => 'required|integer',
            'largura' => 'required|integer',
            'altura' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];
        $feedback = [
            'produto_id.exists' => 'Este produto não é valido',
            'required' => 'O campo :attribute deve ser preenchido',
            'integer' => 'O :attribute deve ser um valor inteiro',
            'unidade_id.exists' => 'Esta unidade não é valida',
        ];
        $request->validate($regras, $feedback);
        $produto_detalhe->update($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutoDetalhe  $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function destroy($produto_detalhe)
    {
        echo 'delete';
    }
}
