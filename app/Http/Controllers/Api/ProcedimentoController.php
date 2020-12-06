<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Procedimento;

class ProcedimentoController extends Controller
{
    public function adicionar(Request $request){
        try{
            $this->validate($request, [
                'nome'         => 'required',
                'telefone'     => 'required',
                'email'        => 'required',
                'data'         => 'required',
                'procedimento' => 'required',
                'hora'         => 'required',
            ]);

            Procedimento::create($request->all());

            return ['return' => 'Cadastrado com sucesso!'];
            
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        } 
    }

    public function listar(){
        try{
            $procedimentos = Procedimento::all();

            return $procedimentos;
        }catch(\Excption $erro){
            return ['return' => 'erro', 'details' => $erro];
        }        
    }

    public function selecionar($id){
        try{
            $procedimentos = Procedimento::find($id);

            return $procedimentos;
        }catch(\Excption $erro){
            return ['return' => 'erro', 'details' => $erro];
        } 
    }

    public function atualizar(Request $request, $id){
        try{

            $procedimentos = $request->all();

            $this->validate($request, [
                'nome'         => 'required',
                'telefone'     => 'required',
                'email'        => 'required',
                'data'         => 'required',
                'procedimento' => 'required',
                'hora'         => 'required',
            ]);

            Procedimento::find($id)->update($procedimentos);

            return ['return' => 'atualizado com sucesso!', 'data'=>$request->all()];//mostra os dados atualizados
            
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        } 
    }

    public function excluir($id){
        try{
            Procedimento::find($id)->delete();

            return ['return' => 'excluido com sucesso!'];
        }catch(\Exception $erro){
            return ['return' => 'erro', 'details' => $erro];
        }
    }
}
