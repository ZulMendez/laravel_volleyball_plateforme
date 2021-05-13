@extends('layouts.index')

@section('content')
    <header class="mb-3">
        @include('partials.nav')
        <h1 class="text-center">Home : Plate-Forme</h1>
        <h3 class="text-center">Compétition VollayBall</h3>
    </header>
    <hr>
    <main class="container">
        <div class="row">
            {{-- equipe  sans joueurs --}}
            <section class="col-6 jumbotron border">
                <h3> équipes SANS joueurs</h3>
                @foreach ($equipes as $equipe)
                    @if (!count($equipe->joueurs))
                        {{ $equipe->nom }} | 
                    @endif
                @endforeach
            </section>
            {{-- equipe avec joueur --}}
            <section class="col-6 jumbotron border">
                <h3> équipes AVEC joueurs</h3>
                @foreach ($equipes as $equipe)
                    @if (count($equipe->joueurs))
                        {{ $equipe->nom }} | 
                    @endif
                @endforeach
            </section>
            {{-- 2 equipe avec joueurs --}}
            <section class="col-6 jumbotron border">
                <h3>2 équipes AVEC joueurs </h3>
                @foreach ($equipes as $equipe)
                    @if (count($equipe->joueurs) && $loop->iteration <=2)
                        {{ $equipe->nom }}
                    @endif
            @endforeach
            </section>
            {{-- 2 equipe sans joueurs --}}
            <section class="col-6 jumbotron border">
                <h3>2 équipes SANS joueurs </h3>
                @foreach ($equipes as $equipe)
                    @if (count($equipe->joueurs) == 0)
                        {{ $equipe->nom }} |
                    @endif
            @endforeach
            </section>
    
            {{-- 4Joueurs sans equipes --}}
            <section class="col-6 jumbotron border">
                <h3>4 Joueurs sans équipes random</h3>
                @foreach ($noEquipeRandom as $joueur)
                        <span>{{ $joueur->prenom }}</span>   
                @endforeach 
            </section>
    
            {{-- 4Joueurs avec équpe --}}
            <section class="col-6 jumbotron border">
                <h3>4 Joueurs avec équipes</h3>
                @foreach ($avecEquipeRandom as $joueur)
                    <span>{{ $joueur->prenom }}</span>   
                @endforeach 
            </section>
    
            {{-- equipe  europe --}}
            <section class="col-6 jumbotron border">
                <h3>Equipe en europe</h3>
                @foreach ($europeEquipe as $equipe)
                    <span>{{ $equipe->nom }}</span> | 
                @endforeach
            </section>
            {{-- equipe non europe --}}
            <section class="col-6 jumbotron border">
                <h3>Equipe non europe</h3>
                @foreach ($noEuropeEquipe as $equipe)
                    <span>{{ $equipe->nom }}</span> |
                @endforeach
            </section>
    
            
            {{-- Joueur femme --}}
            <section class="col-6 jumbotron border">
                <h3>5 Joueuses random avec équipe</h3>
                @forelse ($joueurFemme as $joueur)
                    <span>{{ $joueur->prenom }}</span>
                @empty
                    <span>liste vide</span>
                @endforelse
            </section>
            {{-- Joueur homme --}}
            <section class="col-6 jumbotron border">
                <h3>5 Joueurs random avec équipe</h3>
                @foreach ($joueurHomme as $joueur)
                    <span>{{ $joueur->prenom }}</span> 
                @endforeach
            </section>

        </div>

    </main>


    

@endsection