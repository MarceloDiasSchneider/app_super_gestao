<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;
class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create(['nome' => 'Geladeira', 'descricao' => 'Uma geladeira', 'peso' => '60', 'unidade_id' => '2']);
        Produto::create(['nome' => 'Ar Condicionado', 'descricao' => 'Um ar condicionado', 'peso' => '17', 'unidade_id' => '2']);
        Produto::create(['nome' => 'Bicicleta', 'descricao' => 'Uma bicicleta', 'peso' => '7', 'unidade_id' => '2']);
    }
}
