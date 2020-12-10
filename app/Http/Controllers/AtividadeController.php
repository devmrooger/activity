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
        request()->validate([
            'user_id'   => 'required|numeric',
            'descricao' => 'required|string|max:30',
            'nivel'     => 'required|integer',
            'status'    => 'required|boolean',
        ]);

        $dados = $request->json()->all();
        $atividade = Atividade::create($dados);

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
        // Validação da Requisição
        // ------------------------------------------------
        request()->validate([
            'user_id'   => 'required|numeric',
            'descricao' => 'required|string|max:30',
            'nivel'     => 'required|integer',
            'status'    => 'required|boolean',
        ]);

        // Dados da Requisição
        // ------------------------------------------------
        $dados = $request->json()->all();
        
        // Localização a Atividade
        // ------------------------------------------------
        $atividade = Atividade::find($id);
        if (!$atividade) {
            $result = [
                'message' => 'Atividade não encontrada'
            ];
            return response()->json($result, 404);
        }
        
        // Atualizar a Atividade
        // ------------------------------------------------
        $atividade->update($dados);

        // Retorno da API
        // ------------------------------------------------
        $result = [
            'message'   => 'Atualizado com sucesso',
            'atividade' => $atividade
        ];
        return response()->json($result, 200);
    }

    /**
     * Deletar
     *
     */
    public function destroy($id)
    {
        $atividade = Atividade::find($id);

        if (!$atividade) {
            $result = [
                'message' => 'Atividade não encontrada'
            ];
            return response()->json($result, 404);
        }

        if (!$atividade->delete()) {
            $result = [
                'success' => false,
                'message' => 'Falha ao deletar o arquivo'
            ];
            return response()->json($result, 422);
        }

        $result = [
            'message' => 'Deletado com sucesso'
        ];
        return response()->json($result, 200);
    }
}
