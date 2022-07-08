@extends('template.users')
@extends('template.header')
@section('title', 'Listagem de Posts')
@section('body')
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Listagem de Posts</h1>
            <hr>
            <a class="btn btn-outline-primary mb-2" href="{{ route('users.create') }}">Criar Usuário</a>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr class="text-center align-middle">
                        <th>ID</th>
                        <th>Título</th>
                        <th>Postagem</th>
                        <th>Data de Cadastro</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($posts as $post)
                        <tr class="text-center align-middle">
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->post }}</td>
                            <td class="text-center">{{ date('d/m/Y - H:i', strtotime($post->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
{{-- 
                <div class="text-center mt-2">
                    {{ $posts->links('pagination::bootstrap-5') }}
                </div> --}}
        </div>
    </div>
</div>

@endsection