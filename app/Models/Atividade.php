<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table    = 'activity';
    protected $fillable = ['user_id', 'descricao','categoria','nivel','status'];
}
