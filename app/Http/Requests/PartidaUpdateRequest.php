<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartidaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jogador1' => 'required|string|max:255',
            'jogador2' => 'required|string|max:255',
            'vencedor' => 'required|string|max:255',
            'pontuacao' => 'required|integer|min:0',
        ];
    }

}
