<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    public function parametros($p1, $p2)
    {
        # passando parametros a view
        ## array associativo
        // return view('site.parametros', ['p1' => $p1, 'p2' => $p2]);

        ## compact()
        return view('site.parametros', compact('p1', 'p2'));

        ## with()
        // return view('site.parametros')->with(['p1' => $p1 ,'p2' => $p2]);
    }
}
