@extends('templates.template')

@section('content')
    <h1 class="text-center">ATIVIDADES CRUD</h1>

    <div class="text-center mt-3 bm-4">
    <a href="{{url("activity/create")}}">
        <button class="btn btn-success">Cadastrar</button>
      </a>
    </div>
    <br>
    <div class="container col-8 m-auto">
      @csrf
      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Atarefado</th>
            <th scope="col">Descricao</th>
            <th scope="col">Categoria</th>
            <th scope="col">Nivel</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($activitys as $activity)
            @php
                $user = $activity->find($activity->id)->relUsers;
            @endphp
            <tr>
              <th scope="row">{{$user->name}}</th>
              <td>{{$activity->descricao}}</td>
              <td>{{$activity->categoria}}</td>
              <td>{{$activity->nivel}}</td>
              <td>{{$activity->status == 0 ? 'Não concluído': 'Concluído'}}</td>
              <td>
                <a href="{{url("activity/$activity->id")}}">
                  <button class="btn btn-dark">Visualizar</button>
                </a>
                <a href="{{url("activity/$activity->id/edit")}}">
                  <button class="btn btn-primary">Editar</button>
                </a>
                <a href="{{url("activity/$activity->id")}}" class="js-del">
                  <button class="btn btn-danger">Deletar</button>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection