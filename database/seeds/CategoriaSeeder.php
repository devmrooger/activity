<?php

use Illuminate\Database\Seeder;

use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->salvar('Compras');
        $this->salvar('Serviço Gerais');
        $this->salvar('Limpeza');
    }

    private function salvar($descricao)
    {
        $categoria = Categoria::where('descricao', $descricao)->first();

        if(!$categoria){
            $categoria = new User();
        }

        $categoria->descricao = $descricao;
        $categoria->save();
    }
}
