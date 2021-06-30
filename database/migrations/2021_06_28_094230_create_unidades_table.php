<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 4);
            $table->string('descricoo', 30);
            $table->timestamps();
        });

        // adicionar o relacimento da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // adicionar o relacimento da tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        # a oredem deve ser cronologicamento inversa
        // remover o relacimento da tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            // converção de foreign do larevel [table]_[column]_foreign
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        // remover o relacimento da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            // converção de foreign do larevel [table]_[column]_foreign
            $table->dropForeign('produtos_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        // remover a tabela unidades
        Schema::dropIfExists('unidades');
    }
}
