@extends('template.users')
@extends('template.header')
@section('title', 'Listagem de Usuários')
@section('body')
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Listagem de Usuários</h1>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-md-4">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Cadastrar</a>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('users.index') }}" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="search" class="form-control" name="search" placeholder="Pesquisar...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>

            <table class="table table-hover">
                <thead class="table-dark">
                    <tr class="text-center align-middle">
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Postagens</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($users as $user)
                    <tr class="text-center align-middle">
                        <td>{{ $user->id }}</td>
                        <td>
                            @if($user->image)
                            <img src="{{ asset('storage/'.$user->image) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" style="max-width: 50px;">
                            @else
                            <img src="{{ asset('storage/profiles/avatar.jpg') }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" style="max-width: 50px">
                            @endif
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a class="btn btn-outline-primary" href="{{ route('posts.show', $user->id) }}">{{ $user->posts->count() }}</a>
                        </td>
                        <td class="text-center">{{ date('d/m/Y - H:i', strtotime($user->created_at)) }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Ver</a>
                            {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                            <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger">Excluir</a> --}}
                    </tr>
                        @endforeach
                </tbody>
            </table>

                <div class="text-center mt-2">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
        </div>
    </div>
</div>

@endsection