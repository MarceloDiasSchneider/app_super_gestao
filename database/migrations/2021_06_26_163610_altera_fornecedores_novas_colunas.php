<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlteraFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // esse metodo é chamado pelo php artisan migrate
    public function up()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            // adicionando colunas no banco de dados
            $table->string('uf', 50);
            $table->string('email', 80);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // esse metodo é chamado pelo "php artisan migrate:rollback" revertendo apenas a ultima migração ou com "--step=2" definindo a quantidade de steps que quero voltar
    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            // removendo colunas do banco de dados
            $table->dropColumn(['uf','email']);
        });
    }
}
