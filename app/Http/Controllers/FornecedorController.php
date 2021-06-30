<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'cnpj' => '12.123.123/0001-12',
                'ddd' => '11',
                'telefone' => '1234-4321',
                'status' => 0,
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'cnpj' => '45.456.456/0002-45',
                'ddd' => '54',
                'telefone' => '4567-4567',
                'status' => 0,
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'cnpj' => '78.789.789/0001-78',
                'ddd' => '54',
                'telefone' => '7890-7890',
                'status' => 0,
            ],
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
