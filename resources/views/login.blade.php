@extends('layout')
@section('content')
@include('components/nav')
<header>
    <h2 class="h2login mb-4 display-2">Inicie sesion</h2>
</header>
<main class="container mb-4">
    <form method="post" action="/login" class="mx-auto col-6">
        @include('components.errors')
        @csrf
        <div class="row">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Direccion de E-mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

</main>
</form>

@endSection