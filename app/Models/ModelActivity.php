<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelActivity extends Model
{
    protected $table = 'activity';
    protected $fillable = ['user_id', 'categoria_id', 'descricao','nivel','status'];

    public function relUsers(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
