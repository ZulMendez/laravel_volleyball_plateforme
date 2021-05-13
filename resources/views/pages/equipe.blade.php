@extends('layouts.index')
@section('content')
    <header>
        @include('partials.nav')
        <h1 class="text-center">Coté client: All équipes</h1>
        <p class="text-center">Equipes disponibles</p>
    </header>
    <div class="container">
        <div class="row">
            @foreach ($equipes as $equipe)
                <div class="col-6 card my-4">
                    <div class="card-body">
                        <h4 class="card-title">{{ $equipe->nom }}</h4>
                        <h5 class="card-subtitle mb-2 text-muted">{{ $equipe->pays }} | {{ $equipe->ville }} | {{ $equipe->continent->nom }}</h5>
                        <p class="card-text"> <b>Nombre de joueurs :</b>  {{ count($equipe->joueurs) }} / {{ $equipe->max }}</p>
                        <a href="{{ route('showEquipe', $equipe->id) }}" class="btn btn-primary">show équipe</a>
                        <div class="border my-3">
                            <h5 class="font-weight-bold my-3"><u>Liste des joueurs :</u></h5>
                            @forelse ($equipe->joueurs as $joueur)
                                <span>{{ $joueur->nom }} | {{ $joueur->prenom }} | {{ $joueur->role->nom }}</span> <br>
                                <a href="{{ route('showJoueur', $joueur->id) }}" class="btn btn-success">Voir</a> <br><br>
                            @empty
                                <span>Equipe sans joueurs</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection