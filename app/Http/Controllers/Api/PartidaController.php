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
use Illuminate\Support\Facades\DB;

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

    public function ranking()
    {
        try {
            // Executa a query para calcular o ranking
            $ranking = DB::table('users')
                ->leftJoin('partidas', 'users.id', '=', 'partidas.vencedor_id')
                ->select(
                    'users.id',
                    'users.name',
                    DB::raw('COALESCE(SUM(partidas.pontuacao), 0) AS total_pontuacao')
                )
                ->groupBy('users.id', 'users.name')
                ->orderBy('total_pontuacao', 'desc')
                ->orderBy('users.name', 'asc')
                ->get();

            // Retorna o ranking como JSON
            return response()->json($ranking, 200);
        } catch (\Exception $e) {
            // Loga o erro e retorna uma resposta de erro
            \Log::error('Erro ao calcular o ranking: ' . $e->getMessage());
            return response()->json([
                'message' => 'Erro ao calcular o ranking',
                'error' => $e->getMessage()
            ], 500);
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
public function update(PartidaUpdateRequest $request, Partida $partida)
{
    try {
        $partida->update([
            'jogador1_id' => $request->input('jogador1_id'),
            'jogador2_id' => $request->input('jogador2_id'),
            'vencedor_id' => $request->input('vencedor_id'),
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
