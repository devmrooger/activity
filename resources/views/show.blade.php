@extends('templates.template')

@section('content')
    <h2 class="text-center">VISUALIZAR</h2> <hr>

    <div class="text-center col-8 m-auto">
        @php
            $user = $activity->find($activity->id)->relUsers;
        @endphp
        Atarefado: {{$user->name}} <br>
        Descricao: {{$activity->descricao}} <br>
        Categoria: {{$activity->categoria}} <br>
        Nivel: {{$activity->nivel}} <br> 
        Status: {{$activity->status == 1 ? 'Concluído':'Não concluído'}}
        <br>
    </div>
@endsection