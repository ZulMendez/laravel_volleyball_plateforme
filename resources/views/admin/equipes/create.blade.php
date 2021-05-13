@extends('layouts.index')

@section('content')
    <h1>Création d'une équipe</h1>
    <a href="{{ route('equipe.index') }}" class="btn btn-secondary">back</a>
    @include('layouts.flash')
    <form action="{{ route('equipe.store') }}" method="POST" class="w-75 mx-auto row">
        @csrf
        <div class="col-6">
            <div class="form-group">
                <label for="nom">Nom de l'équipe</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" placeholder="Entrer le nom">
                @error('nom')
                    <span class="text-danger small">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="max">Max joueur</label>
                <input type="number" class="form-control" id="max" name="max" value="{{ old('max') }}" placeholder="Entrer le max">
                @error('max')
                    <span class="text-danger small">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="pays">Pays</label>
                <input type="text" class="form-control" id="pays" name="pays" value="{{ old('pays') }}" placeholder="Entrer le pays">
                @error('pays')
                    <span class="text-danger small">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" value="{{ old('ville') }}" placeholder="Entrer le ville">
                @error('ville')
                    <span class="text-danger small">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-8 mx-auto form-group">
            <label for="continent_id">Continent</label>
            <select class="form-control" id="continent_id" name="continent_id">
                @foreach ($continents as $continent)
                    <option value="{{ $continent->id }}">{{ $continent->continent }}</option>       
                @endforeach
            </select>
            @error('continent_id')
                <span class="text-danger small">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection