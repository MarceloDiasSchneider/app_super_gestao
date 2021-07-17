<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::create(['unidade' => 't', 'descricao' => 'tonelada']);
        Unidade::create(['unidade' => 'kg', 'descricao' => 'kilogramo']);
        Unidade::create(['unidade' => 'g', 'descricao' => 'gramo']);
    }
}
