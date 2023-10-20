<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
class UsuarioController extends Controller
{
    //
    // CREATE
    public function createUsuario(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required|numeric'
        ]);
        $usuario = new Usuario();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->created_at = now();
        $usuario->save();
        return response()->json($usuario, 201);
    }

    // READ
    public function getUsuarios(){
        $usuarios = Usuario::all();
        return response()->json($usuarios,200);
    }
    public function getUsuario($id){
        $usuario = Usuario::find($id);
        return response()->json($usuario, 200);
    }
    // UPDATE
    public function atualizarUsuario(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        // Valide os dados da solicitação, se necessário
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required|numeric'
        ]);

        // Atualize os campos do produto com os dados da solicitação
        $usuario->name = $request->input('name');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->email = $request->input('email');

        // Salve as alterações no banco de dados
        $usuario->save();

        return response()->json($usuario, 200);
    }

    //DELETE
    public function excluirUsuario($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuário excluído com sucesso']);
    }
}
