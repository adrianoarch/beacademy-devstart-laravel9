@extends('template.users')
@extends('template.header')
@section('title', "Listagem de Postagens do {$user->name}")
@section('body')

    <h1 class="mb-3">Postagens de {{ $user->name }}</h1>

    @foreach($posts as $post)
        <div class="card my-3">
            <div class="card-header">
                <h5 class="card-title">{{ $post->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $post->post }}</p>
            </div>
            <div class="card-footer d-flex">
                <small class="">Status: {{ $post->active?'Ativo':'Inativo'}} </small>
                <small class="text-muted ms-auto">Cadastrado em {{ date('d/m/Y - H:i', strtotime($post->created_at)) }}</small>
            </div>
        </div>
    @endforeach


@endsection