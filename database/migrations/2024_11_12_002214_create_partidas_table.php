<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->id('codpartida');
            $table->string('Jogador1');
            $table->string('Jogador2');
            $table->string('Vencedor');
            $table->integer('pontuacao');
            $table->timestamps();
        });
    } //'Jogador1','Jogador2', 'Vencedor', 'Pontuacao'

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};
