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
            'denunciante' => $this->denunciante,
            'denunciado' => $this->denunciado,
            'descricao' => $this->descricao,
            'reg_date' => $this->reg_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }




    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->setStatusCode(200, 'Denuncia Atualizada!');
    }

    public function with(Request $request): array
    {
        return [
            'message' => 'Denuncia registrada com sucesso!!',
        ];
    }
}
