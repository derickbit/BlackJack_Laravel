<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $table = 'partidas';
    protected $fillable = ['Jogador1','Jogador2', 'Vencedor', 'pontuacao'];
    protected $primaryKey = 'codpartida';

}
