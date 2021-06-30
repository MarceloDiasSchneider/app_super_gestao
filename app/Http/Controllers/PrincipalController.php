<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal()
    {
        $options_motivo_contato = MotivoContato::all();

        // titulo da pagina enviado ao componente
        $titulo = 'Home';
        return view('site.principal', compact(['titulo', 'options_motivo_contato']));
    }
}
