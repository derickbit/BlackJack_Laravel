<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Partida;
use Illuminate\Http\Request;
use App\Http\Resources\PartidaResource;
use App\Http\Resources\PartidaCollection;
use App\Http\Resources\PartidaStoredResource;
use App\Http\Resources\PartidaUpdatedResource;
use App\Http\Requests\PartidaStoreRequest;
use App\Http\Requests\PartidaUpdateRequest;
use Exception;

class PartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PartidaCollection(Partida::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartidaStoreRequest $request)
    {
        try {
            // Valida os dados e cria a partida
             $partida = Partida::create($request->validated());
            return (new PartidaStoredResource($partida))
            ->additional(['message'=> 'Partida registrada com Sucesso'])
            ->response()
            ->setStatusCode(201, 'Partida criada');
        } catch (Exception $error) {
            // Trate erros e retorne um status apropriado
            $this->errorHandler("Erro ao cadastrar partida",$error);
    }}



    /**
     * Display the specified resource.
     */
    public function show(Partida $partida)
    {
        return new PartidaResource($partida);
    }

   /**
 * Update the specified resource in storage.
 */
public function update(PartidaUpdateRequest $request, Partida $partida)
{
    try {
        $partida->update([
            'Jogador1' => $request->input('jogador1'),
            'Jogador2' => $request->input('jogador2'),
            'Vencedor' => $request->input('vencedor'),
            'pontuacao' => $request->input('pontuacao'),
        ]);

        return new PartidaUpdatedResource($partida);
    } catch (\Exception $error) {
        return $this->errorHandler("Erro ao atualizar a partida!", $error);
    }
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partida $partida)
    {
        try{
            $partida->delete();
            return (new PartidaResource($partida))->additional(["message"=>"Partida Removida!"]);
        }catch (Exception $error){
            return $this->errorHandler("Erro ao remover Partida", $error);
        }
    }
}
