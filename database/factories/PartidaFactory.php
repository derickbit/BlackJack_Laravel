<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partida>
 */
class PartidaFactory extends Factory
{

    public function definition(): array
    {
        return [
            'jogador1' => fake()->text(100),
            'jogador2' => fake()->text(100),
            'vencedor' => fake()->text(100),
            'pontuacao' => fake()->numberBetween(0, 100),
        ];
    }


}