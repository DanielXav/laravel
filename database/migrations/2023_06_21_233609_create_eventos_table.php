<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 128);
            //$table->foreignId('cpf_cliente')->constrained()->onDelete('cascade'); // Se deletar cliente, deleta evento junto
            $table->string('cpf_cliente', 11);
            $table->foreign('cpf_cliente')->references('cpf')->on('clientes')->onDelete('cascade');
            $table->string('tipo', 128);
            $table->double('orcamento')->nullable();
            $table->date('data_evento');
            $table->string('rua', 256);
            $table->string('numero', 64);
            $table->string('bairro', 128);
            $table->string('cidade', 128);
            $table->string('CEP', 128);
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
        Schema::dropIfExists('eventos');
    }
};
