<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    public function index()
    {
        return view('denuncias', ['denuncias' => Denuncia::all()]);
    }

    public function show($id)
    {
        return view('denuncia', ['denuncia' => Denuncia::find($id)]);
    }

    public function create()
    {
        return view('denuncia_create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if (Denuncia::create($data)) {
            return redirect('/denuncias');
        } else {
            dd('Erro ao cadastrar denúncia');
        }
    }

    public function edit($id)
    {
        return view('denuncia_edit', ['denuncia' => Denuncia::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if (!Denuncia::find($id)->update($data)) {
            dd("Erro ao atualizar denúncia $id !");
        }
        return redirect('/denuncias');
    }

    public function delete($id)
    {
        return view('denuncia_remove', ['denuncia' => Denuncia::find($id)]);
    }

    public function remove(Request $request, $id)
    {
        if ($request->confirmar === "Deletar") {
            if (!Denuncia::destroy($id)) {
                dd("Erro ao deletar denúncia $id !");
            }
        }
        return redirect('/denuncias');
    }
}
