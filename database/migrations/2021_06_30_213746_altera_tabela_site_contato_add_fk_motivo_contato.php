<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlteraTabelaSiteContatoAddFkMotivoContato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function( Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id')->after('email');
        });

        // // transportando os dados de motivo_contato para motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        // criando a fk e removendo a coluna motivo_contato
        Schema::table('site_contatos', function( Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // criando a coluna motivo_contato e removendo a fk
        Schema::table('site_contatos', function( Blueprint $table) {
            $table->integer('motivo_contato')->after('email');
            $table->dropForeign('site_contat    os_motivo_contatos_id_foreign');
        });

        // transportando os dados de motivo_contatos_id para  motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        // removendo a coluna motivo_contatos_id
        Schema::table('site_contatos', function( Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
