<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('rg');
            $table->string('telefone');
            $table->string('email');
            $table->string('avatar')->nullable();
            $table->string('cep', 8);
            $table->string('rua');
            $table->string('numero', 10);
            $table->string('complemento')->nullable();
            $table->string('barrio');
            $table->string('cidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
