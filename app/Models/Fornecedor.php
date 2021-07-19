<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos()
    {
        // Deixando explicito o relacionamento entre tabelas, se não estiver nos padrões do Laravel
        // return $this->hasMany('App\Models\Produtos', 'fornecedor_id', 'id');
        // se o relacionamente entre tabelas estiver nos padrões do Laravel
        return $this->hasMany('App\Models\Produto')->with('produto_detalhe');
    }

}
