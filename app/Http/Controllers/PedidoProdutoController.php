<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];
        $feedback = [
            'produto_id.exists' => 'Este produto não é valido',
            'quantidade.required' => 'A quantidade deve ser informada'
        ];
        $request->validate($regras, $feedback);
        // inserindo o registro com um metodo tradicional
        // PedidoProduto::create([
        //     'pedido_id' => $pedido->id,
        //     'produto_id' => $request->get('produto_id'),
        //     'quantidade' => $request->get('quantidade')
        // ]);

        // inserindo o registro atravez do metodo attach do realacionamento N x N de forma unitaria
        // $pedido->produtos_do_pedido()->attach($request->get('produto_id'), [
        //     'quantidade' => $request->get('quantidade')
        // ]);
        // inserindo o registro atravez do metodo attach do realacionamento N x N recebendo um array assosiativo com varios registros
        $pedido->produtos_do_pedido()->attach([
            $request->get('produto_id') => [
                'quantidade' => $request->get('quantidade')
            ]
        ]);

        return redirect()->route('pedido.show', $pedido->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Pedido  $pedido
     * @param  \Illuminate\Http\Produto  $produto
     * @param  \Illuminate\Http\PedidoProduto  $pedido_produto
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Pedido $pedido, Produto $produto)
    public function destroy(PedidoProduto $pedido_produto)
    {
        // ## removendo os registro com o metodo tradicional, acessando a Model com ids de pedido e produto
        // PedidoProduto::where([
        //     'pedido_id' => $pedido->id,
        //     'produto_id' => $produto->id,
        // ])->delete();

        // ## removendo os registros com o metodo detach com ids de pedido e produto
        // utilizando a estancia do pedido com o metodo produtos_do_pedido
        // $pedido->id é definido pela instancia do $pedido
        // $pedido->produtos_do_pedido()->detach($produto->id);
        // utilizando a estancia do produto com o metodo pedidos_do_produto
        // $produto->id é definido pela instancia do $produto
        // $produto->pedidos_do_produto()->detach($pedido->id);

        // ## removendo to registro pelo seu id
        $pedido_produto->delete();
        return redirect()->back();
    }
}
