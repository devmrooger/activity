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
