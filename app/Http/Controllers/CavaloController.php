<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cavalo;
class CavaloController extends Controller
{
   public function showHome(){
        return view("home");
    }

    public function showFormularioCadastro(Request $request){

        return view("formularioCadastroCavalo");
    }

    public function cadCavalo(Request $request){
        $dadosValidos = $request->validate([
            'nome' => 'string|required',
            'raca' => 'string|required',
            'idade' => 'numeric|required'
        ]);

        Cavalo::create($dadosValidos);
        return Redirect::route('home');
    }

    public function mostrarGerenciarCavaloId(Cavalo $id){

        return view('formularioAlterarCavalo',['registrosCavalos' => $id]);
    }

    public function  gerenciarCavalo(Request $request){
        $dadosCavalo = Cavalo::query();
        $dadosCavalo->when($request->nome,function($query,$valor){
            $query->where('nome','like','%'.$valor.'%');
        });
        $dadosCavalo = $dadosCavalo->get();

        return view('gerenciarCavalo',['registrosCavalos' => $dadosCavalo]);
    }

    public function destroy(Cavalo $id){   
        $id->delete();
        return Redirect::route('home');
    }

    public function alterarCavaloBanco(Cavalo $id,Request $request){
        
        $dadosValidos = $request->validate([
            'nome' => 'string|required',
            'raca' => 'string|required',
            'idade' => 'numeric|required'
        ]);
        $id->fill($dadosValidos);
        $id->save();
        return Redirect::route('home');
    }
}
