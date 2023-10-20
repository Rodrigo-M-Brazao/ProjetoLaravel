<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{

    // CREATE
    public function createProduto(Request $request){
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price'=> 'required|numeric',
            'stock'=> 'required|numeric'
        ]);
        $produto = new Produto();
        $produto->name = $request->input('name');
        $produto->desc = $request->input('desc');
        $produto->price = $request->input('price');
        $produto->stock = $request->input('stock');
        $produto->created_at = now();
        $produto->save();
        return response()->json($produto, 201);
    }

    // READ
    public function getProdutos(){
        $produtos = Produto::all();
        return response()->json($produtos,200);
    }
    public function getProduto($id){
        $produto = Produto::find($id);
        return response()->json($produto, 200);
    }
    // UPDATE
    public function atualizarProduto(Request $request, $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        // Valide os dados da solicitação, se necessário
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price'=> 'required|numeric',
            'stock'=> 'required|numeric'
        ]);

        // Atualize os campos do produto com os dados da solicitação
        $produto->name = $request->input('name');
        $produto->price = $request->input('price');
        $produto->stock = $request->input('stock');
        $produto->desc = $request->input('desc');

        // Salve as alterações no banco de dados
        $produto->save();

        return response()->json($produto, 200);
    }

    //DELETE
    public function excluirProduto($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $produto->delete();

        return response()->json(['message' => 'Produto excluído com sucesso']);
    }
}
