<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Atividade;

class AtividadeController extends Controller
{
    /**
     * Listar
     *
     */
    public function index()
    {
        $atividades = Atividade::all();
        return $atividades;
    }


    /**
     * Consultar
     *
     */
    public function show($id)
    {
        $atividade = Atividade::find($id);

        if (!$atividade) {
            $result = [
                'message' => 'Atividade não encontrada'
            ];
            return response()->json($result, 404);
        }

        return $atividade;
    }    

    /**
     * Salvar
     *
     */
    public function store(Request $request)
    {
        $dados = $request->json()->all();

        $atividade = new Atividade();

        $atividade->user_id   = $dados['user_id'];
        $atividade->descricao = $dados['descricao'];
        $atividade->categoria = $dados['categoria'];
        $atividade->nivel     = $dados['nivel'];
        $atividade->status    = $dados['status'];

        $atividade->save();

        $result = [
            'message'   => 'Salvo com sucesso',
            'atividade' => $atividade
        ];
        return response()->json($result, 201);

    }

    /**
     * Atualizar
     *
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Deletar
     *
     */
    public function destroy($id)
    {
        //
    }
}
