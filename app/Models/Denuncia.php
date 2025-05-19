<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Denuncia extends Model
{
    protected $table = 'denuncia'; // Nome da tabela no banco
    protected $primaryKey = 'coddenuncia'; // Chave primária

    protected $fillable = ['denunciante_id', 'denunciado_id', 'descricao','imagem'];

    public function denunciante()
    {
        return $this->belongsTo(User::class, 'denunciante_id');
    }

    public function denunciado()
    {
        return $this->belongsTo(User::class, 'denunciado_id');
    }
    use hasFactory;
}
