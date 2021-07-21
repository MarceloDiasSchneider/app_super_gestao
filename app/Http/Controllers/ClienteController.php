<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(10);
        return view('app.cliente.listar', compact('clientes', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create');
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
            'nome' => 'required|min:3|max:50'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O nome deve ter ao menos 3 caracteres',
            'nome.max' => 'O nome pode ter até 50 caracteres'
        ];
        $request->validate($regras, $feedback);
        Cliente::create($request->all());
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente  $cliente)
    {
        return view('app.cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente  $cliente)
    {
        return view('app.cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente  $cliente)
    {
        $regras = [
            'nome' => 'required|min:3|max:50'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O nome deve ter ao menos 3 caracteres',
            'nome.max' => 'O nome pode ter até 50 caracteres'
        ];
        $request->validate($regras, $feedback);
        $cliente->update($request->all());
        return redirect()->route('cliente.show', $cliente->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente  $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
