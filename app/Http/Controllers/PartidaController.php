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

}
