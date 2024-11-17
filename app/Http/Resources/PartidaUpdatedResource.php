<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartidaUpdatedResource extends PartidaResource
{
   /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->setStatusCode(201,'Partida Registrada!');
    }

    public function with(Request $request): array
    {
        return [
            'message' => 'Partida registrada com sucesso!!',
        ];
    }
}
