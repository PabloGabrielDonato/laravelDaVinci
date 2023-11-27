@extends('layout')
@section('content')
@include('components/nav')


<main class="container">
    <h2>Dashboard</h2>
    <div class="row mx-auto gap-5 justify-content-center">
        <section class="col-md-6 card">
            <h3>
                Información de usuario.
            </h3>
            <div>
                <p>Nombre: {{ $user->name }}</p>
                <p>E-mail: {{ $user->email }}</p>
                <p>Rol: {{ $user->role }}</p>
                <a href="/lawyer/create/{{ $user->id }}"></a>
            </div>
        </section>
        <section class="col-md-6 card">
            <h3>
                Información personal.
            </h3>
            <div class="infoPer">
                <p>D.N.I: {{ $userData->dni }}</p>
                <img src="{{ asset($userData->avatar) }}" alt="avatar image">
            </div>
        </section>
        @if ($user->isLawyer())
        <section class="col-md-12 m-1">
            <h3>
                Información del abogado.
            </h3>
            @if($lawyer->solicitud == 'aceptada')
            <div>

                <div>
                    <p>Nombre: {{ $lawyer->firstName }}</p>
                    <p>lastName: {{ $lawyer->lastName }}</p>
                    <p>topic: {{ $lawyer->topic }}</p>
                    <p>adress: {{ $lawyer->address }}</p>
                    <p>phone: {{ $lawyer->phone }}</p>
                    <p>email: {{ $lawyer->email }}</p>
    
                </div>
                <article class="border p-2">
                    <h4>Tus posts</h4>
                    <a href="{{ route('post.create') }}" class="btn btn-success">Crear post</a>
                    <div class="row">
                        @forelse($lawyer->posts as $post)
                        <div class="card col-5 m-2">
                            <div class="card-body">
                                <h5 class="card-title">Titulo: {{ $post->title }}</h5>
                                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="card-img-top" height="200"
                                    width="150">
                                <p class="card-text">{{ $post->descripcion }}</p>
                                <h6>Categorias</h6>
                                <div class="d-flex gap-4">
                                    @foreach ($post->categories as $category)
                                    <p class="border p-2 rounded-2">{{ $category->name }}</p>
    
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-around">
                                <a href="/post/{{ $post->id }}/edit/" class="btn btn-warning">Editar</a>
                                <form method="POST" action="{{ route('post.eliminar') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $post->id }}" name="id">
                                    <button class="btn btn-danger" type="submit">Elminar</button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <h5>No hay posteos todavia, que esperas!</h5>
                        @endforelse
                    </div>
                </article>
                @else
                <h4 class="text-danger">Solicitud en Tramite</h4>
                @endif
            </div>
        </section>
        @else
        <a href="/lawyer/create" class="btn btn-success mb-4 col-md-8">Crear perfil de abogado</a>
        @endif
    </div>
</main>


@endSection