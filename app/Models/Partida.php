<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $table = 'partidas';
    protected $primaryKey = 'codpartida';

    protected $fillable = ['jogador1_id', 'jogador2_id', 'vencedor_id', 'pontuacao'];

    public function jogador1()
    {
        return $this->belongsTo(User::class, 'jogador1_id');
    }

    public function jogador2()
    {
        return $this->belongsTo(User::class, 'jogador2_id');
    }

    public function vencedor()
    {
        return $this->belongsTo(User::class, 'vencedor_id');
    }

}
