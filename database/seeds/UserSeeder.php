<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->salvar('Rafael', 'rafael@email.com', '123');
        $this->salvar('Mauro' , 'mauro@email.com', '456');
    }


    private function salvar($nome, $email, $senha)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            $user = new User();
        } 
        $user->name     = $nome;
        $user->email    = $email;
        $user->password = bcrypt($senha);
        $user->save();
    }

}
