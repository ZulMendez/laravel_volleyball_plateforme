@extends('layouts.index')

@section('content')
<header class="mb-4">
    <h1 class="text-center">EQUIPES</h1>
    <a href="{{ route('admin') }}" class="ml-5 btn btn-secondary">BACK</a>
    <a href="{{ route('equipe.create') }}" class="btn btn-success">Add team</a>
</header>
@include('layouts.flash')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Max</th>
                    <th scope="col">N°joueurs</th>
                    <th scope="col">N°AT</th>
                    <th scope="col">N°CT</th>
                    <th scope="col">N°DC</th>
                    <th scope="col">N°RP</th>
                    <th scope="col">Continent</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipes as $equipe)
                <tr>
                    <th scope="row">{{ $equipe->id }}</th>
                    <td>{{ $equipe->nom }}</td>
                    <td>{{ $equipe->ville }}</td>
                    <td>{{ $equipe->pays }}</td>
                    <td>{{ $equipe->max }}</td>
                    <td>{{ count($equipe->joueurs)}}</td>
                    <td>{{ $equipe->AT }}</td>
                    <td>{{ $equipe->CT }}</td>
                    <td>{{ $equipe->DC }}</td>
                    <td>{{ $equipe->RP }}</td>
                    <td>{{ $equipe->continent->continent }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('equipe.show', $equipe->id) }}" class="mx-1 btn btn-primary">show</a>
                        <a href="{{ route('equipe.edit', $equipe->id) }}" class="mx-1 btn btn-success">edit</a>
                        <form action="{{ route('equipe.destroy', $equipe->id) }}" method="POST">
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
