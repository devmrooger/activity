@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($activity))Editar @else Cadastrar @endif</h1>

    

    <div class=" container col-8 m-auto">

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
                <select class="form-control"name="user_id" id="user_id" required>
                    <option value="{{$activity->relUsers->id ?? ''}}">{{$activity->relUsers->name ?? 'Nome Atarefado'}}</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                </select><br>
                <input class="form-control" id="categoria" name="categoria" type="text" placeholder="Categoria" value="{{$activity->categoria ?? ''}}" required><br>
                <input class="form-control" id="descricao" name="descricao" type="text" placeholder="Descrição" value="{{$activity->descricao ?? ''}}" required><br>

                {{-- <div class="custom-control custom-switch ">
                    <input id="status" name="status"  type="checkbox" class="custom-control-input" value="{{$activity->status ?? 0}}">
                    <label class="custom-control-label" for="status">Concluído</label>
                </div> --}}

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

                <br>
                <input class="form-control" id="nivel" name="nivel" type="text" placeholder="Nível" value="{{$activity->nivel ?? ''}}" required><br>
                <input class="btn btn-primary" type="submit" value="@if(isset($activity)) Salvar @else Cadastrar @endif"><br>
            </form>
            <div class="container">
                <a href="{{url("activity")}}">
                    <button class="btn btn-dark">Voltar</button>
                </a>
            </div>
    </div>
@endsection