<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id'];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function produtos_do_pedido()
    {
        // relacionamento n para n com nome padronizado pelo framework laravel
        return $this->belongsToMany('App\Models\Produto', 'pedido_produtos')->withPivot('id', 'quantidade' ,'created_at', 'updated_at');
        // relacionamento n para n com nome não padronizado pelo framework laravel
        // return $this->belongsToMany('App\Models\Item', 'pedido_produtos', 'pedido_id', 'produto_id');
    }
}
