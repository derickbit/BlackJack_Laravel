<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class PartidaUpdatedResource extends PartidaResource
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




    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->setStatusCode(200, 'Partida Atualizada!');
    }

    public function with(Request $request): array
    {
        return [
            'message' => 'Partida registrada com sucesso!!',
        ];
    }
}
