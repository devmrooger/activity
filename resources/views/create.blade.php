@extends('templates.template')

@section('content')
    <h1 class="col-12 text-center">@if(isset($activity))Editar @else Cadastrar @endif</h1><hr>

    <div class="container col-8 m-auto"><br>
        @if (isset($errors) && count($errors) > 0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach ($errors->all() as $erro)
                    {{$erro}}
                @endforeach
            </div>
        @endif
        @if (isset($activity))
            <form id="formEdit" name="formEdit" action="{{url("activity/$activity->id")}}" method="post">
                @method('PUT')
        @else
            <form id="formCad" name="formCad" action="{{url("activity")}}" method="post">
        @endif
            @csrf
                <div class="row">
                    <div class="col">
                        <label for="user_id">Atarefado</label>
                        <select class="form-control"name="user_id" id="user_id" required>
                            <option value="{{$activity->relUsers->id ?? ''}}">{{$activity->relUsers->name ?? 'Nome Atarefado'}}</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="categoria">Categoria</label>
                        <input class="form-control" id="categoria" name="categoria" type="text" placeholder="Categoria" value="{{$activity->categoria ?? ''}}" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="descricao">Descrição</label>
                        <input class="form-control" id="descricao" name="descricao" type="text" placeholder="Descrição" value="{{$activity->descricao ?? ''}}" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" placeholder="Status" required>
                            <option value="{{$activity->status ?? ''}}">
                                @if (isset($activity))
                                    @if ($activity->status === 0)
                                        Não Concluído
                                    @else
                                        Concluído
                                    @endif
                                @else
                                    Status
                                @endif
                            </option>
                            <option value="0">Não Concluído</option>
                            <option value="1">Concluído</option>
                        </select>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-3">
                        <label for="nivel">Nível</label>
                        <input class="form-control" id="nivel" name="nivel" type="text" placeholder="Nível" value="{{$activity->nivel ?? ''}}" required><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mr-auto">
                        <a href="{{url("activity")}}">
                            <button class="btn btn-dark">Voltar</button>
                        </a>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-auto">
                        <input class="btn btn-primary" type="submit" value="@if(isset($activity)) Salvar @else Cadastrar @endif"><br>
                    </div>
                </div>
            </form>
    </div>
@endsection