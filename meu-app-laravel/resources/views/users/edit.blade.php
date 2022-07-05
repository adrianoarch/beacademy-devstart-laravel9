@extends('template.users')
@section('title', "Usuário {$user->name}")
@section('body')
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <h1 class="text-center">Editar Usuário</h1>
                
                @if(isset($errors) && count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
                @endif
                
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nome" value="{{ $user->name }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Selecione uma imagem</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection