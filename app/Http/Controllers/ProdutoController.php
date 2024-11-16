<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produto;

    public function index(){
        $this->produto = new Produto();
        return view('produtos',['produtos'=>$this->produto->all()]);
    }

    public function show($id){
        return view('produto', ['produto' => Produto::find($id)]);
    }

    public function create(){
        return view('produto_create');
    }

    public function store(Request $request){
        $newProduto = $request->all();
        $newProduto['importado']=($request->importado)?true:false;
        if(Produto::create($newProduto))
            return redirect('/produtos');
        else dd('Erro ao cadastrar produto');
        // protected $fillable = ['nome','descricao', 'qtd_estoque', 'preco','importado'];
    }

    public function update(Request $request, $id){
        $updatedProduto = $request->all();
        $updatedProduto['importado'] = ($request->importado) ? true : false;
        if(!Produto::find($id)->update($updatedProduto))
           dd("Erro ao atualizar produto $id !");
        return redirect ('/produtos');
    }

    public function edit($id){

        return view('produto_edit', [
            'produto'=>Produto::find($id)
        ]);
    }

    public function delete($id){

        return view('produto_remove', [
            'produto'=>Produto::find($id)
        ]);
    }

    public function remove (Request $request, $id){
        if($request->confirmar==="Deletar")
            if(!Produto::destroy($id))
                 dd("Erro ao deletar produto $id !");
        return redirect('/produtos');

    }




}
