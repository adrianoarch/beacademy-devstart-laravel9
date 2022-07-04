@extends('template.users')
@section('title', $title)
@section('body')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Detalhes do Usuário {{$user->name}}</h1>
            <form action="" method="get">
                <div class="form-group mb-3">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group mb-3">
                    <label for="created_at">Data de Cadastro</label>
                    <input type="text" name="created_at" id="created_at" class="form-control" value="{{$user->created_at}}">
                </div>
                <div class="form-group mb-3">
                    <label for="updated_at">Data de Atualização</label>
                    <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$user->updated_at}}">
                </div>
                <div class="form-group mb-3">
                    <a href="{{ route('users.edit', $user->id) }}" type="submit" class="btn btn-primary">Editar</a>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
                <div class="form-group mb-3">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Retornar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection