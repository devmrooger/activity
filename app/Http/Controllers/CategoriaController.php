<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Listar
     * 
     */
    public function index()
    {
        $categoria = Categoria::all();
        return $categoria;
    }

    /**
     * Consultar
     * 
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        if(!$categoria){
            $result = [
                'message' => 'Categoria não encontrada',
            ];

            return response()->json($result, 404);
        }

        return $categoria;
    }

    /**
     * Salvar
     * 
     */
    public function store(Request $request)
    {
        request()->validate([
            'descricao'   => 'required|string|max:30',
        ]);

        $dados = $request->json()->all();
        $categoria = Categoria::create($dados);

        $result = [
            'message'   => 'Salvo com sucesso',
            'atividade' => $categoria,
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
            'descricao'   => 'required|string|max:30',
        ]);

        // Dados da Requisição
        // ------------------------------------------------
        $dados = $request->json()->all();

        // Localização a Categoria
        // ------------------------------------------------
        $categoria = Categoria::find($id);
        if(!$categoria){
            $result = [
                'message' => 'Categoria não encontrada',
            ];

            return response()->json($result, 404);
        }

        // Atualizar a Categoria
        // ------------------------------------------------
        $categoria->update($dados);

        // Retorno da API
        // ------------------------------------------------
        $categoria = Categoria::create($dados);
        $result = [
            'message'   => 'Salvo com sucesso',
            'atividade' => $categoria,
        ];

        return response()->json($result, 201);
    }

    /**
     * Deletar
     * 
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if(!$categoria){
            $result = [
                'message' => 'Categoria não encontrada',
            ];

            return response()->json($result, 404);
        }

        if (!$categoria->delete()) {
            $result = [
                'sucess'  => false,
                'message' => 'Falha ao deletar arquivo'
            ];
            return response()->json($result, 422);
        }

        $result = [
            'message' => 'Deletado com sucesso'
        ];
        return response()->json($result, 200);
    }
}
