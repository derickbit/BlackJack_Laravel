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
            return new ProdutoStoredResource(Produto::create($request->validated()));
        } catch (Exception $error) {
            return $this->errorHandler("Erro ao registrar partida!", $error);
        }
    }

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
    public function update(PartidaUpdateRequest $request, Partida $partida){
        try{
            $partida->update($request->valedated());
            return new PartidaUpdatedResource($partida);
        }catch(Exception $error){
            return $this->errorHandler("Erro ao atualizar partida!", $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partida $partida)
    {
        try{
            $partida->delete;
            return (new PartidaResource($partida))->additional(["message"=>"Partida Removida!"]);
        }catch (Exception $error){
            return $this->errorHandler("Erro ao remover Partida", $error);
        }
    }
}
