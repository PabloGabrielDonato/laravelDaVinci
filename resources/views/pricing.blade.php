@extends('layout')
@section('content')
@include('components/nav')


<main class="container">
     <article class="container">
        <h2 class="display-2 text-center" id="ofertas">Estos son nuestros mejores abogados</h2>
        <div class="row gap-3 cardsAbogados justify-content-center ">
            @foreach($posts as $post)
            <div class="card mb-3" style="width: 25rem;">
                <img src="{{$post->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->descripcion}}</p>
                    <div class="d-grid">
                        <a href="#" class="btn btn-primary">Contratar</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </article>
</main>


@endSection