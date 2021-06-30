<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobrenosController extends Controller
{
    public function sobrenos()
    {
        // titulo da pagina enviado ao componente
        $titulo = 'Sobre nós';
        return view('site.sobre-nos', compact('titulo'));
    }
}
