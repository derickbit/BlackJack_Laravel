<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class DenunciaUpdatedResource extends DenunciaResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'coddenuncia' => $this->coddenuncia,
            'denunciante_id' => [
                'id' => $this->denunciante_id,
                'nome' => $this->denunciante_id->name ?? null, // Nome do denunciante
            ],
            'denunciado_id' => [
                'id' => $this->denunciado_id,
                'nome' => $this->denunciante_id->name ?? null, // Nome do denunciado
            ],
            'descricao' => $this->descricao,
        ];
    }

    /**
     * Modifica o código e a mensagem da resposta.
     */
    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->setStatusCode(200, 'Denuncia Atualizada!');
    }

    /**
     * Adiciona metadados adicionais na resposta.
     */
    public function with(Request $request): array
    {
        return [
            'message' => 'Denuncia registrada com sucesso!!',
        ];
    }
}
