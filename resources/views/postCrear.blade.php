@extends('layout')
@section('content')
<h2 class="mb-4 display-2">Cree un nuevo post</h2>
<main class="container">

    <form method="POST">
        @csrf
        <div class=" mb-3">
            <label class="form-label">Titulo</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class=" form-label">Descripcion</label>
            <input type="text" class="form-control" name="descripcion">
        </div>
        <div class="mb-3">
            <label class=" form-label">Precio</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="mb-3">
            @foreach($categorys as $category)
            <label class=" form-label">{{$category->name}}</label>
            <input type="checkbox" name="{{$category->name}}" value="{{$category->id}}">
            @endForEach
        </div>
        <div class="mb-3">
            <label class=" form-label">imagen</label>
            <input type="text" class="form-control" name="image">
        </div>
        <button type=" submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@endSection