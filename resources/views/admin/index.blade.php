@extends('admin.layout')

@section('content')
    <main>
        <header >
            <h1>Panel de control Admin</h1>
            <p>Bienvenido {{ auth()->user()->name }}</p>
        </header>
        <section class="mx-auto">
            <h2>Datos del sitio</h2>
            <div class="row">
                <article class="col-md-6 card">
                    <h3>Usuarios</h3>
                    <p>Total de usuarios <span>{{ count($usersLawyers) + count($usersNoLawyers) }}</span></p>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Abogados </h4>
                            <ul>
                                @forelse($usersLawyers as $userLawyer)
                                    <li>{{ $userLawyer->name }}</li>

                                @empty
                                    <h5>No hay abogados registrados</h5>
                                @endforelse
                            </ul>

                        </div>
                        <div class="col-md-6">

                            <h4>Clientes</h4>
                            <ul>
                                @forelse($usersNoLawyers as $userNoLawyer)
                                    <li>{{ $userNoLawyer->name }}</li>
                                @empty
                                    <h5>No hay Clientes</h5>
                                @endforelse
                            </ul>
                        </div>

                    </div>
                </article>
                <article class="col-md-8 card">
                    <h3>posts</h3>
                    <p>Total de posts <span>{{ count($posts) }}</span></p>
                    <ul>
                        @forelse($posts as $post)
                            <li><div>
                                <h4>{{ $post->title }}</h4>
                                <p><strong>{{ $post->lawyer->email }}</strong></p>
                            </div>
                                </li>
                        @empty
                            <h5>No hay posts</h5>
                        @endforelse
                    </ul>
                </article>
            </div>
            <article class="col-12 card">
                <h3>Solicitudes</h3>
                <p>Aceptadas: <span></span></p>
                <p>Pendientes: <span></span></p>
            </article>
        </section>
    </main>
@endsection
