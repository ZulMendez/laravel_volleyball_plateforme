@extends('layouts.index')

@section('content')
<header class="mb-4">
    <h1 class="text-center">JOUEURS</h1>
    <a href="{{ route('admin') }}" class="ml-5 btn btn-secondary">BACK</a>
    <a href="{{ route('joueur.create') }}" class="btn btn-success">Add player</a>
</header>
@include('layouts.flash')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Age</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Equipe</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs as $joueur)
                <tr>
                    <th scope="row">{{ $joueur->id }}</th>
                    <td>{{ $joueur->nom }}</td>
                    <td>{{ $joueur->prenom }}</td>
                    <td>{{ $joueur->age }}</td>
                    <td>+32 {{ $joueur->tel }}</td>
                    <td>{{ $joueur->genre->genre }}</td>
                    <td>{{ $joueur->email }}</td>
                    <td>{{ $joueur->role->poste }}</td>
                    <td>{{ $joueur->equipe ? $joueur->equipe->nom : "/" }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('joueur.show', $joueur->id) }}" class="mx-1 btn btn-primary">show</a>
                        <a href="{{ route('joueur.edit', $joueur->id) }}" class="mx-1 btn btn-success">edit</a>
                        <form action="{{ route('joueur.destroy', $joueur->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
