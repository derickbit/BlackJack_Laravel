<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    public function index(){
        $this->partida = new Partida();
        return view('partidas',['partidas'=>$this->partida->all()]);
    }

    public function show($codpartida){
        return view('partida', ['partida' => Partida::find($codpartida)]);
    }

    public function create(){
        return view('partida_create');
    }

    public function store(Request $request){
        // dd($request->all());
        $newPartida = $request->all();
        if(Partida::create($newPartida))
            return redirect('/partidas');
        else dd('Erro ao cadastrar partida');
    }

    public function update(Request $request, $codpartida){
        $updatedPartida = $request->all();
        if(!Partida::find($codpartida)->update($updatedPartida))
           dd("Erro ao atualizar partida $codpartida !");
        return redirect ('/partidas');
    }

    public function edit($codpartida){

        return view('partida_edit', [
            'partida'=>Partida::find($codpartida)
        ]);
    }

    public function delete($codpartida){

        return view('partida_remove', [
            'partida'=>Partida::find($codpartida)
        ]);
    }

    public function remove (Request $request, $codpartida){
        if($request->confirmar==="Deletar")
            if(!Partida::destroy($codpartida))
                 dd("Erro ao deletar produto $codpartida !");
        return redirect('/partidas');

    }

}
