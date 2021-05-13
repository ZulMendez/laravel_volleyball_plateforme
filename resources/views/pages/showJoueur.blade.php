@extends('layouts.index')

@section('content')
<header>
    @include('partials.nav')
    <h1 class="text-center">Show player: {{ $joueur->prenom }}</h1>
</header>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto card my-3">
                <div class="card-body">
                    <img class="card-img-top mb-3" src="{{ asset('img/'. $joueur->photo->url) }}" alt="{{ $joueur->photo->url }}">
                    <h5 class="card-title">{{ $joueur->nom }}  {{ $joueur->prenom }} | {{ $joueur->age }}y</h5>
                    @if ($joueur->equipe)
                        <h6 class="card-subtitle mb-2 text-muted"><b>Equipe : </b> <a href="{{ route('showEquipe', $joueur->equipe->id) }}">{{ $joueur->equipe->nom}}</a> </h6>   
                    @else   
                        <h6><b>Joueur libre</b></h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection