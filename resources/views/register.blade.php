@extends('layout')
@section('content')
@include('components/nav')
<header>
    <h2 class="mx-4 display-2">Registrese</h2>
</header>
<main class="container mb-4">

    <form method="post" action="/register" enctype="multipart/form-data" class="mx-auto col-8">
        @include('components.errors')
        @csrf
        <div class="row">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Direccion de E-mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text text-warning">Nunca compartiremos tu email con nadie más.</div>
            </div>
           
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Nombre y apellido</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleInputPassword1" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="dni">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1"  class="form-label">Foto de perfil</label>
                <input class="form-control" type="file"  id="exampleInputPassword1" name="avatar">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</main>

@endSection