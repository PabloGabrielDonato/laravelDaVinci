@extends('layout')
@section('content')

<h2 class="mb-4 display-2">Edite su post</h2>
    <form method="POST" action="{{ route('post.editar') }}">
        @include('components.errors')
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
            <label class="form-label">Titulo</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="descripcion" value="{{$post->descripcion}}">
            <label class=" form-label">Descripcion</label>
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" name="price" value="{{$post->price}}">
            <label class=" form-label">Precio</label>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" value="{{$post->id}}" name="id" value="{{$post->id}}">
        </div>
        <button type=" submit" class="btn btn-primary">Submit</button>
    </form>

    @endSection