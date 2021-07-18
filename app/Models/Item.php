<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produto_detalhe()
    {
        return $this->hasOne('App\Models\ItemDetalhe', 'produto_id', 'id');
    }

    public function unidade()
    {
        return  $this->belongsTo('App\Models\Unidade');
    }
}
