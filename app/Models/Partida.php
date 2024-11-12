<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $fillable = ['codpartida','Jogador1','Jogador2', 'Vencedor', 'pontuacao'];
}
