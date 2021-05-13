@extends('layouts.index')

@section('content')
<h1 class="text-center">Modification du joueur : {{ $joueur->prenom }}</h1>
<a href="{{ route('joueur.index') }}" class="btn btn-secondary">BACK</a>
@include('layouts.flash')
<form action="{{ route('joueur.update', $joueur->id) }}" method="POST" class="w-75 mx-auto row"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-6">
        <div class="form-group">
            <label for="nom">Nom du joueur</label>
            <input type="text" class="form-control" id="nom" value="{{ $joueur->nom }}" name="nom"
                placeholder="Entrer le nom">
            @error('nom')
            <span class="text-danger small">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="prenom">Prénom du joueur</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $joueur->prenom }}"
                placeholder="Entrer le prenom">
            @error('prenom')
            <span class="text-danger small">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="age">L'age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $joueur->age }}"
                placeholder="Entrer l'age">
            @error('age')
            <span class="text-danger small">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="tel">Le numéro</label>
            <input type="number" class="form-control" id="tel" name="tel" value="{{ $joueur->tel }}"
                placeholder="Entrer le tel">
            @error('tel')
            <span class="text-danger small">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $joueur->email }}"
                placeholder="Entrer le email">
            @error('email')
            <span class="text-danger small">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="genre_id">Le sexe</label>
            <select class="form-control" id="genre_id" name="genre_id">
                @foreach ($genres as $genre)
                <option {{ $genre->genre == $joueur->genre->genre ? 'selected' : '' }} value="{{ $genre->id }}">
                    {{ $genre->genre }}</option>
                @endforeach
            </select>
            @error('genre_id')
            <span class="text-danger small">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="role_id">Role</label>
            <select class="form-control" id="role_id" name="role_id">
                @foreach ($roles as $role)
                <option {{ $role->poste == $joueur->role->poste ? 'selected' : '' }} value="{{ $role->id }}">
                    {{ $role->poste }}</option>
                @endforeach
            </select>
            @error('role_id')
            <span class="text-danger small">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="equipe_id">L'equipe</label>
            <select class="form-control" id="equipe_id" name="equipe_id">
                @foreach ($equipes as $equipe)
                {{-- condition pour verifier si le joueur appartient à une equipe --}}
                @if ($joueur->team)
                <option {{ $equipe->nom == $joueur->team->nom ? 'selected' : '' }} value="{{ $equipe->id }}">
                    {{ $equipe->nom }}</option>
                @else
                <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                @endif
                @endforeach
            </select>
            @error('equipe_id')
            <span class="text-danger small">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="img">Photo</label>
            <input type="file" name="img">
            @error('img')
            <span class="text-danger small">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
