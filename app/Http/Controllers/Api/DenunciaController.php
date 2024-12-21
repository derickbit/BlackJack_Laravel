<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Denuncia;
use Illuminate\Http\Request;
use App\Http\Resources\DenunciaResource;
use App\Http\Resources\DenunciaCollection;
use App\Http\Resources\DenunciaStoredResource;
use App\Http\Resources\DenunciaUpdatedResource;
use App\Http\Requests\DenunciaStoreRequest;
use App\Http\Requests\DenunciaUpdateRequest;
use Exception;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new DenunciaCollection(Denuncia::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DenunciaStoreRequest $request)
    {
        try {
            // Valida os dados e cria a Denuncia
             $denuncia = Denuncia::create($request->validated());

                if($request->file('imagem')){
                    $fileName = $request -> file('imagem')->hashName();
                    if(!$request-> file('imagem')->store('denuncias','public')){
                        throw new Exception('Imagem não foi salva');
                    }
                    $denuncia['imagem']=$fileName;
                }

            return (new DenunciaStoredResource($denuncia))
            ->additional(['message'=> 'Denuncia registrada com Sucesso'])
            ->response()
            ->setStatusCode(201, 'Denuncia criada');
        } catch (Exception $error) {
            // Trate erros e retorne um status apropriado
            $this->errorHandler("Erro ao cadastrar denuncia",$error);
    }}



    /**
     * Display the specified resource.
     */
    public function show(Denuncia $Denuncia)
    {
        return new DenunciaResource($Denuncia);
    }

   /**
 * Update the specified resource in storage.
 */
public function update(DenunciaUpdateRequest $request, Denuncia $Denuncia)
{
    try {
        $Denuncia->update([
            'denunciante_id' => $request->input('denunciante_id'),
            'denunciado_id' => $request->input('denunciado_id'),
            'descricao' => $request->input('descricao'),
        ]);

        return new DenunciaUpdatedResource($Denuncia);
    } catch (\Exception $error) {
        return $this->errorHandler("Erro ao atualizar a Denuncia!", $error);
    }
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Denuncia $Denuncia)
    {
        try{
            $Denuncia->delete();
            return (new DenunciaResource($Denuncia))->additional(["message"=>"Denuncia Removida!"]);
        }catch (Exception $error){
            return $this->errorHandler("Erro ao remover Denuncia", $error);
        }
    }
}
