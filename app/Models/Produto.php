<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['fornecedor_id', 'nome', 'descricao', 'peso', 'unidade_id'];

    public function produto_detalhe()
    {
        return $this->hasOne('App\Models\ProdutoDetalhe');
    }

    public function unidade()
    {
        return  $this->belongsTo('App\Models\Unidade');
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Models\Fornecedor');
    }
}
