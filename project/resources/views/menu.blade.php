<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Projeto em Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item {{ Request::is('filmes') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('filmes') }}">Filmes</a>
            </li>
            <li class="nav-item {{ Request::is('contato') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contato.form') }}">Contato</a>
            </li>
        </ul>
    </div>
</nav>