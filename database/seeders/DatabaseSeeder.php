<?php

namespace Database\Seeders;

use App\Models\Unidade;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        // chamando a class seeder em database/seeders/NameSeeder.php
        $this->call(FornecedorSeeder::class);
        $this->call(MotivoContatoSeeder::class);
        $this->call(SiteContatoSeeder::class);
        $this->call(UnidadeSeeder::class);

        // chamando a class App/Models/SiteContato
        \App\Models\SiteContato::factory(10)->create();
    }
}
