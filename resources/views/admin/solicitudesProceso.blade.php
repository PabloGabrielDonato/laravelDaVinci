@extends('admin.layout')

@section('content')

    <nav>
        <ul>
            <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
            <li><a href="{{ route('admin.solicitudesProceso') }}">Solicitudes en Progreso</a></li>
            {{-- <li><a href="{{ route('admin.categories.index') }}">Categorías</a></li>
            <li><a href="{{ route('admin.posts.index') }}">Posts</a></li>
            <li><a href="{{ route('admin.images.index') }}">Imágenes</a></li> --}}
        </ul>
    </nav>

    <h1>Panel de control Admin</h1>

    <main>
        <h2>Solicitudes de proceso de abogados</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit hic suscipit exercitationem ullam fuga, aspernatur deserunt. Illo, est ipsum repellat aspernatur aliquid quo tenetur. Magnam at commodi molestias facere quo.</p>
    </main>
@endsection