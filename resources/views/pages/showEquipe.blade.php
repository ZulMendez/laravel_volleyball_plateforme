@extends('layouts.index')
@section('content')
    <header>
        @include('partials.nav')
        <h1 class="text-center">Show team: {{ $equipe->nom }}</h1>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-8  mx-auto card my-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $equipe->nom }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $equipe->pays }} | {{ $equipe->ville }} | {{ $equipe->continent->nom }}</h6>
                    <p class="card-text"> <b>Nombre de joueurs :</b>  {{ count($equipe->joueurs) }} / {{ $equipe->max }}</p>
                    <hr>
                    <p>Liste des joueurs :</p>
                    @forelse ($equipe->joueurs as $joueur)
                        <span>{{ $joueur->nom }} | {{ $joueur->prenom }} | {{ $joueur->role->nom }}</span> <a href="{{ route('showJoueur', $joueur->id) }}" class="btn btn-success">Voir</a> <br><br>
                    @empty
                        <span>pasd de joueurs dispo</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection