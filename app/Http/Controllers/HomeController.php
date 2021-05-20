<?php

namespace App\Http\Controllers;

use App\Models\Authorization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function  index() {
        $usuarios = User::all();
        $permitir_excluir = !empty(Authorization::where('user_id', Auth::id())->where('chave_autorizacao', 'excluir_clientes')->first());
        $permitir_cadastrar = !empty(Authorization::where('user_id', Auth::id())->where('chave_autorizacao', 'cadastrar_clientes')->first());

        return view('dashboard', compact('usuarios', 'permitir_excluir', 'permitir_cadastrar' ));
    }

    public function buscar(Request $request){
        $permitir_excluir = !empty(Authorization::where('user_id', Auth::id())->where('chave_autorizacao', 'excluir_clientes')->first());
        $permitir_cadastrar = !empty(Authorization::where('user_id', Auth::id())->where('chave_autorizacao', 'cadastrar_clientes')->first());
        $nome = $request->name;
        $usuarios = User::where('name', 'like', '%'.$nome.'%')->get();
        return view('dashboard', compact('usuarios', 'permitir_excluir', 'permitir_cadastrar' ));
    }

    public function desativar(User $usuario){
        if(!empty(Authorization::where('user_id', Auth::id())->where('chave_autorizacao', 'excluir_clientes')->first())){
            $usuario->update(['ativo' => 'N']);
            return redirect('/dashboard');
        }
        else {
            abort(401, 'Você não tem permissão para desativar usuários');
        }
    }
    public function ativar(User $usuario){
        if(!empty(Authorization::where('user_id', Auth::id())->where('chave_autorizacao', 'excluir_clientes')->first())){
        $usuario->update(['ativo' => 'S']);
        return redirect('/dashboard');
        }
        else {
                abort(401, 'Você não tem permissão para ativar usuários');
        }
    }
}
