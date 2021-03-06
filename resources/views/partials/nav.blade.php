<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <a class="navbar-brand" href="{{ route('home') }}">VolleyBall</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav w-100">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('equipes') }}">Equipes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('joueurs') }}">Joueurs</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link text-white" href="{{ route('admin') }}">ADMIN</a>
            </li>
        </ul>
    </div>
</nav>