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
            $table->integer('codpartida');
            $table->String('Jogador1');
            $table->String('Jogador2');
            $table->String('Vencedor');
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
