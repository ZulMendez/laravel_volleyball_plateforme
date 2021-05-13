@extends('layouts.index')

@section('content')
    <h1 class="text-center">ADMIN | Dashboard</h1>
    <a href="/" class="mx-5 my-auto btn btn-secondary">BACK</a>
    <div class="container my-5">
        {{-- @foreach ($joueurs as $joueur) --}}
            {{-- @dump($joueur->prenom)
            @dump($joueur->role->nom)
            @dump($joueur->photo->url) --}}
            {{-- <p>{{ $joueur->equipe ? $joueur->equipe->nom : "pas d'équipe" }}</p> --}}
            {{-- @dump($joueur->equipe->nom) --}}
            {{-- @dump($joueur->equipe->continent->nom) --}}
            {{-- <hr> --}}
        {{-- @endforeach --}}
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <h3 class="my-3">Mini récap equipes</h3>
                    <div class="card-body">
                        @forelse ($equipes  as $equipe)
                            <p> <b>Equipe {{ $equipe->id }} :</b> {{ $equipe->nom }}</p>
                        @empty
                            <p>pas d'équipes dispo</p>
                        @endforelse
                        <a href="{{ route('equipe.index') }}" class="btn btn-primary">GO equipes</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <h3 class="my-3">Mini récap joueurs</h3>
                    <div class="card-body">
                        @forelse ($joueurs  as $joueur) 
                            <p> <b>Joueur {{ $joueur->id }} :</b> {{ $joueur->prenom }}</p>
                        @empty
                            <p>pas de joueurs dispo</p>
                        @endforelse
                        <a href="{{ route('joueur.index') }}" class="btn btn-primary">GO joueurs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection