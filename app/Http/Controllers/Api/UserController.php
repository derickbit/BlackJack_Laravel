<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserStoredResource;
use App\Http\Resources\UserUpdatedResource;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new UserCollection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        try {
            // Valida os dados e cria a User
             $user = User::create($request->validated());
            return (new UserStoredResource($user))
            ->additional(['message'=> 'Usuário registrada com Sucesso'])
            ->response()
            ->setStatusCode(201, 'usuário criado');
        } catch (Exception $error) {
            // Trate erros e retorne um status apropriado
            $this->errorHandler("Erro ao cadastrar usuário",$error);
    }}



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

   /**
 * Update the specified resource in storage.
 */
public function update(UserUpdateRequest $request, User $user)
{
    try {
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return new UserUpdatedResource($user);
    } catch (\Exception $error) {
        return $this->errorHandler("Erro ao atualizar usuário!", $error);
    }
}

public function listarJogadores()
{
    return response()->json(User::select('id', 'name')->get());
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        try{
            $User->delete();
            return (new UserResource($User))->additional(["message"=>"User Removida!"]);
        }catch (Exception $error){
            return $this->errorHandler("Erro ao remover User", $error);
        }
    }
}
