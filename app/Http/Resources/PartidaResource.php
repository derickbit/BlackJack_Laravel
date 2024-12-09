<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class PartidaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'codpartida' => $this->codpartida,
            'jogador1' => $this->Jogador1,
            'jogador2' => $this->Jogador2,
            'vencedor' => $this->Vencedor,
            'pontuacao' => $this->pontuacao,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }


}
