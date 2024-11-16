<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $table = 'denuncia'; // Nome da tabela no banco
    protected $primaryKey = 'coddenuncia'; // Chave primária
    public $timestamps = false; // Não usa created_at/updated_at

    protected $fillable = [
        'denunciante',
        'denunciado',
        'descricao',
        'reg_date',
    ];
}
