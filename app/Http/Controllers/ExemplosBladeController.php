<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ExemplosBladeController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('exemplos', compact('fornecedores'));
    }
}
