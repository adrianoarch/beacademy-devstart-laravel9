@extends('template.users')
@section('title', 'Listagem de Usuários')
@section('body')
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Listagem de Usuários</h1>
            <table class="table table-secondary table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">{{ date('d/m/Y - H:i', strtotime($user->created_at)) }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Ver</a>
                            {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                            <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger">Excluir</a> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>

@endsection