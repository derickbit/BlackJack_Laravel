<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class DenunciaStoredResource extends DenunciaResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->setStatusCode(201, 'Denuncia Criada!');
    }

    public function with(Request $request): array
    {
        return [
            'message' => 'Denuncia registrada com sucesso!!',
        ];
    }
}
