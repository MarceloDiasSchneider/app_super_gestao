<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
