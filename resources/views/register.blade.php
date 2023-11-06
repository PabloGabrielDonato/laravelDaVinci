@extends('layout')
@section('content')
@include('components/nav')
<h2 class="mb-4 display-2">Registrese</h2>
<form method="post" action="/register">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">

    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Direccion de E-mail</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">DNI</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="dni">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Avatar</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="avatar">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endSection