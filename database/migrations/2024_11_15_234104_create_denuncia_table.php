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
        $table->foreignId('denunciante_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('denunciado_id')->constrained('users')->onDelete('cascade');
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
