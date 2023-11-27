@extends('admin.layout')

@section('content')
    <h1>Administrador de usuarios</h1>

    <div class="row">

        <form class="col-md-6 mx-auto" action="/admin" method="post">
            @include('components.errors')
            @csrf
            <h2>Crear Administrador</h2>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input id="nombre"class="form-control" type="text" name="name" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" >
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input id="dni" class="form-control" type="number" name="dni" >
            </div>
            
            <div class="form-group">
                <label for="email">Password</label>
                <input id="password" class="form-control" type="password" name="password" >
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>

    <section class="container">
        <div class="row">

            <article>
                <h2>Administradores</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>DNI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usersAdmin as $userAdmin)
                            <tr>
                                <td>{{ $userAdmin->name }}</td>
                                <td>{{ $userAdmin->email }}</td>
                                <td>{{ $userAdmin->userData->dni }}</td>
                            </tr>
                        @empty
                            <h5>No hay administradores</h5>
                        @endforelse
                    </tbody>
                </table>
            </article>
            <article>
                <h2>Abogados</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>DNI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usersLawyers as $userLawyer)
                            <tr>
                                <td>{{ $userLawyer->name }}</td>
                                <td>{{ $userLawyer->email }}</td>
                                <td>{{ $userLawyer->userData->dni }}</td>
                            </tr>
                        @empty
                            <h5>No hay abogados</h5>
                        @endforelse
                    </tbody>
                </table>
            </article>
            <article>
                <h2>Clientes</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>DNI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usersNoLawyers as $userNoLawyer)
                            <tr>
                                <td>{{ $userNoLawyer->name }}</td>
                                <td>{{ $userNoLawyer->email }}</td>
                                <td>{{ $userNoLawyer->userData->dni }}</td>
                            </tr>
                        @empty
                            <h5>No hay clientes</h5>
                        @endforelse
                    </tbody>
                </table>    
            </article>
    </section>
@endsection
