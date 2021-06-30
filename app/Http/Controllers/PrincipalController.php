<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal()
    {
        $options_motivo_contato = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação',
        ];

        // titulo da pagina enviado ao componente
        $titulo = 'Home';
        return view('site.principal', compact(['titulo', 'options_motivo_contato']));
    }
}
