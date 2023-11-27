@extends('layout')
@section('content')
<main>
    <h2>Datos para registrarse como abogado</h2>
    <form method="post" action="/lawyer" class="mx-auto col-8">
        @include('components.errors')
        @csrf
        <div class="row">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="firstName">

        </div>
        <div class="row">
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="lastName">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Especialidad</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="topic">
        </div>
        </div>
        <div class="row">
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="address">
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInputPassword1" class="form-label">Teléfono</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="phone">
        </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="exampleInputPassword1" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar a abogado</button>
        </div>
    </form>
</main>