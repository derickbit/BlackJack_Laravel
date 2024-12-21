<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Denuncia>
 */
class DenunciaFactory extends Factory
{

    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();

        return [
            'denunciante_id' => $this->faker->randomElement($userIds), // Escolhe um ID de denunciante
            'denunciado_id' => $this->faker->randomElement($userIds),  // Escolhe um ID de denunciado
            'descricao' => $this->faker->sentence(),
            'reg_date' => $this->faker->date(),
        ];
    }


}