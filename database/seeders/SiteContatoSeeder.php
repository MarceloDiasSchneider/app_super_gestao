<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contato = new SiteContato();
        $contato->nome = 'Contato Default';
        $contato->telefone = '+39 123 456 1234';
        $contato->email = 'contato@supergestao.com.br';
        $contato->motivo_contato = '1';
        $contato->mensagem = 'Uma mensagem default de teste';
        $contato->save();

        SiteContato::factory(5)->create();
    }
}
