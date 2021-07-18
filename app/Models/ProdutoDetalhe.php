<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoDetalhe extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function unidade()
    {
        return $this->belongsTo('App\Models\Unidade');
    }

    public function produto()
    {
        return  $this->belongsTo('App\Models\Produto');
    }
}
