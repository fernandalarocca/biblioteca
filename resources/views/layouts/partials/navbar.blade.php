<body class="bg-dark">
@include("layouts.assets.bootstrap")
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Biblioteca</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("clients.list") }}">Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("books.list") }}">Livros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("authors.list") }}">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("loans.list") }}">Empréstimos</a>
                </li>
            </ul>
        </div>
        <div class="navbar-end">
            <a href="{{ route('login') }}" type="button" class="btn btn-primary">Login</a>
        </div>
    </div>
</nav>
</body>
