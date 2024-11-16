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
    Schema::create('denuncia', function (Blueprint $table) {
        $table->id('coddenuncia');
        $table->String('denunciante');
        $table->String('denunciado');
        $table->text('descricao');
        $table->date('reg_date')->default(DB::raw('CURRENT_DATE'));
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncia');
    }
};
