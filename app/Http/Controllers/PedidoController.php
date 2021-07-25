<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(10);
        return view('app.pedido.listar', compact('pedidos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('app.pedido.create', compact('clientes'));
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
            'cliente_id' => 'exists:clientes,id'
        ];
        $feedback = [
            'cliente_id.exists' => 'Este cliente não é valido',
        ];
        $request->validate($regras, $feedback);
        $pedido = Pedido::create($request->all());
        return redirect()->route('pedido.show', $pedido->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $produtos = Produto::all();
        return view('app.pedido.show', compact('pedido', 'produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        return view('app.pedido.edit', compact('pedido', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $regras = [
            'cliente_id' => 'exists:clientes,id'
        ];
        $feedback = [
            'cliente_id.exists' => 'Este cliente não é valido',
        ];
        $request->validate($regras, $feedback);
        $pedido->update($request->all());
        return redirect()->route('pedido.show', $pedido->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedido.index');
    }
}
